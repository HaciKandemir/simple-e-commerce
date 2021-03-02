<?php
session_start();
session_destroy();
require ('vendor/autoload.php');

if(isset($_GET['page'])&&$_GET['page']==="basket"){
	$page="basket.php";
}else{
	$page="index.php";	
}

$db = new \App\Database\Database();
$rawProducts = $db->all();
$products = null;
$basketProductCount = null;
foreach ($rawProducts as $rawPrdct){
    if ($rawPrdct['category']==="cellphone"){
        $products[] = new \App\Entity\CellPhone($rawPrdct);
    }else if($rawPrdct['category']==="animalFood"){
        if ($rawPrdct['sub_category']==="cat"){
            $products[] = new \App\Entity\CatFood($rawPrdct);
        }else if($rawPrdct['sub_category']==="dog"){
            $products[] = new \App\Entity\DogFood($rawPrdct);
        }
    }
}
if (isset($_SESSION['basket'])&&count($_SESSION['basket'])>0){
    $basketProductCount = count($_SESSION['basket']);
}

include ('view/base.php');

?>