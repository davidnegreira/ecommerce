<?php

declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\TriggersEventTrait;

class Product
{
    use TriggersEventTrait;

    private readonly string $productId;
    private string $name;
    private string $description;
    private int $tax;
    private int $price;

    public function __construct(string $productId, string $name, string $description, int $tax, int $price)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->description = $description;
        $this->tax = $tax;
        $this->price = $price;

        $this->notifyDomainEvent(new ProductWasCreated($productId));
    }
}
