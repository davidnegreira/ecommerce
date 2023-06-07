<?php

declare(strict_types=1);

namespace App\Application\Product\Command;

use App\Application\Bus\Command\Command;

final class CreateProductCommand extends Command
{
    public function __construct(
        public readonly string $productId,
        public readonly string $name,
        public readonly string $description,
        public readonly int $tax,
        public readonly float $price,
    ) {
    }
}
