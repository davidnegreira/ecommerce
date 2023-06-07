<?php

declare(strict_types=1);

namespace App\Domain\Product;

interface ProductRepository
{
    public const PAGE_SIZE = 10;

    /** @return Product[] */
    public function findByName(?string $name, int $page): array;

    public function save(Product $product): void;
}
