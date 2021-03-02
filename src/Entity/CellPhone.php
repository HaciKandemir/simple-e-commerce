<?php 
namespace App\Entity;

/**
 * 
 */
class CellPhone extends Product
{

    function __construct($product)
	{
	    parent::__construct($product);
        $this->setCategory($product['category']);
    }
}


 ?>