<?php


namespace App\Entity;


class CatFood extends AnimalFood
{

    public function __construct($product)
    {
        parent::__construct($product);
    }
}