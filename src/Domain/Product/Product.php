<?php

declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\TriggersEventTrait;

class Product
{
    use TriggersEventTrait;

    public function __construct(private readonly string $productId)
    {
        $this->notifyDomainEvent(new ProductWasCreated($this->productId));
    }
}
