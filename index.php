<?php 

if(isset($_GET['page'])&&$_GET['page']==="basket"){
	$page="basket.php";
}else{
	$page="index.php";	
}

require ('vendor/autoload.php');
include ('view/base.php');

?>