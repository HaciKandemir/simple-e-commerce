<?php 
namespace App\Entity;

/**
 * 
 */
abstract class Product
{
	private $id;
    private $name;
    private $price;
    private $currency;
    protected $category;
    protected $subCategory;
    private $imageUrl;

	function __construct($product)
	{
	    $this->setId($product['id']);
        $this->setName($product['name']);
        $this->setPrice($product['price']);
        $this->setCurrency($product['currency']);
        $this->setImageUrl($product['image_url']);
        $this->subCategory = $product['sub_category']??null;
	}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}

 ?>