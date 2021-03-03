<?php
session_start();
require ('vendor/autoload.php');

if(isset($_GET['page'])&&$_GET['page']==="basket"){
	$page="basket.php";
}else{
	$page="index.php";	
}

if (!isset($_SESSION['total_basket_count'])){
    $_SESSION['total_basket_count'] = 0;
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
if ($_SESSION['total_basket_count']>0){
    $basketProductCount = $_SESSION['total_basket_count'];
}

include ('view/base.php');

?>