<?php

namespace App\Tests\Domain\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductRepository;

class ProductRepositorySpy implements ProductRepository
{
    private ?Product $product = null;
    private array $listOfResults = [];

    public function save(Product $product): void
    {
        $this->product = $product;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function findByName(?string $name, int $page): array
    {
        return $this->listOfResults;
    }

    public function addListOfResult(Product ...$products): void
    {
        $this->listOfResults = $products;
    }
}
