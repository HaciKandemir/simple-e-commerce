<?php


namespace App\Entity;


abstract class AnimalFood extends Product
{

    public function __construct($product)
    {
        parent::__construct($product);
    }
}