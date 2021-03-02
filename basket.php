<?php
session_start();
require ('vendor/autoload.php');
if (isset($_POST['id']) && $_POST['id'] != null){
    $id = $_POST['id'];
    if (isset($_SESSION['basket'][$id])){
        $_SESSION['basket'][$id]['count']+=1;
    }else{
        $prdct=\App\Database\Database::find($id);
        if (!is_null($prdct)){
            $_SESSION['basket'][$id] = [
                "name"=>$prdct['name'],
                "price"=>$prdct['price'],
                "currency"=>$prdct['currency'],
                "img_url"=>$prdct['image_url'],
                "count"=>1
            ];
        }
    }
    echo json_encode(['basket_count'=>count($_SESSION['basket'])]);
}else{
    echo json_encode(["err"=>"id parametresi gönderilmedi"]);
}
