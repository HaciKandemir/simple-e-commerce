<?php
session_start();
//session_destroy();
require ('vendor/autoload.php');
if (isset($_POST['id']) && isset($_POST['action'])){
    $id = $_POST['id'];
    $action = $_POST['action'];
    if (isset($_SESSION['basket'][$id])){
        if ($action==="up"){
            $_SESSION['basket'][$id]['count']+=1;
            $_SESSION['total_basket_count'] +=1;
            echo json_encode(['success'=>true, 'basket_count'=>$_SESSION['total_basket_count']]);
        }else if ($action==="down" && $_SESSION['basket'][$id]['count']>1){
            $_SESSION['basket'][$id]['count']-=1;
            $_SESSION['total_basket_count'] -=1;
            echo json_encode(['success'=>true, 'basket_count'=>$_SESSION['total_basket_count']]);
        }
    }
} else if (isset($_POST['id'])){
    $id = $_POST['id'];
    if (isset($_SESSION['basket'][$id])){
        $_SESSION['basket'][$id]['count']+=1;
        $_SESSION['total_basket_count'] +=1;
    }else{
        $prdct=\App\Database\Database::find($id);
        if (!is_null($prdct)){
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
