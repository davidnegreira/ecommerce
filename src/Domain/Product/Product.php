<?php

declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\TriggersEventTrait;
use JsonSerializable;

class Product implements JsonSerializable
{
    use TriggersEventTrait;

    public function __construct(
        private readonly string $productId,
        private readonly string $name,
        private readonly string $description,
        private readonly int $tax,
        private readonly float $price,
    ) {
        $this->notifyDomainEvent(new ProductWasCreated($productId));
    }

    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price
        ];
    }
}
