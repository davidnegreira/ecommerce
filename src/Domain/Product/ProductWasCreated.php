<?php

declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\DomainEvent;

final class ProductWasCreated implements DomainEvent
{
    public function __construct(public readonly string $productId)
    {
    }
}
