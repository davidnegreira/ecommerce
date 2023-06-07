<?php

declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\Common\Uuid;
use App\Domain\TriggersEventTrait;
use JsonSerializable;

class Product implements JsonSerializable
{
    use TriggersEventTrait;

    private function __construct(
        public readonly string $productId,
        private readonly string $name,
        private readonly string $description,
        private readonly int $tax,
        private readonly float $price,
    ) {
        $this->notifyDomainEvent(new ProductWasCreated($productId));
    }

    public static function register(Uuid $productId, string $name, string $description, ProductTax $tax, float $price): self
    {
        return new self(
            (string)$productId,
            $name,
            $description,
            $tax->toInt(),
            $price
        );
    }

    private function priceWithTax(): float
    {
        return $this->price * (1 + $this->tax / 100);
    }


    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "tax" => $this->tax,
            "priceWithTax" => $this->priceWithTax(),
        ];
    }
}
