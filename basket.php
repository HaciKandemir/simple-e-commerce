<?php
session_start();
//session_destroy();
require ('vendor/autoload.php');
new \App\Database\Database("src/Database/database.json");

//basket sayfasındaki adet değiştirme işlemli
if (isset($_POST['id']) && isset($_POST['action'])){
    $id = $_POST['id'];
    $action = $_POST['action'];
    $total = null;
    $returnData = null;
    if (isset($_SESSION['basket'][$id])){
        if ($action==="up"){
            $_SESSION['basket'][$id]['count']+=1;
            $_SESSION['total_basket_count'] +=1;
            $total = ($_SESSION['basket'][$id]['count']*$_SESSION['basket'][$id]['price']);
        }else if ($action==="down" && $_SESSION['basket'][$id]['count']>1){
            $_SESSION['basket'][$id]['count']-=1;
            $_SESSION['total_basket_count'] -=1;
            $total = ($_SESSION['basket'][$id]['count']*$_SESSION['basket'][$id]['price']);
        }else if($action==="delete"){
            $_SESSION['total_basket_count'] -= $_SESSION['basket'][$id]['count'];
            unset($_SESSION['basket'][$id]);
        }
        echo json_encode($returnData = ['success'=>true, 'basket_count'=>$_SESSION['total_basket_count'],
                'this_total_price'=>$total]
        );
    }
}else if (isset($_POST['id'])){ //index sayfasındaki sepete ekeleme işlemi
    $id = $_POST['id'];
    if (isset($_SESSION['basket'][$id])){
        $_SESSION['basket'][$id]['count']+=1;
        $_SESSION['total_basket_count'] +=1;
    }else{
        $prdct=\App\Database\Database::find($id,"products");
        if (isset($prdct)){
            $_SESSION['basket'][$id] = [
                "id"=>$prdct['id'],
                "name"=>$prdct['name'],
                "price"=>$prdct['price'],
                "currency"=>$prdct['currency'],
                "img_url"=>$prdct['image_url'],
                "count"=>1
            ];
            $_SESSION['total_basket_count'] +=1;
        }
    }
    echo json_encode(['basket_count'=>$_SESSION['total_basket_count']]);
}else{
    echo json_encode(["err"=>"id parametresi gönderilmedi"]);
}
