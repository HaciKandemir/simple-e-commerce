<?php


namespace App\Entity;


class DogFood extends AnimalFood
{

    public function __construct($product)
    {
        parent::__construct($product);
    }
}