<?php

declare(strict_types=1);

namespace App\Domain\Product;

interface ProductRepository
{
    /** @return Product[] */
    public function all(): array;

}
