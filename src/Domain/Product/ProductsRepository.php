<?php

declare(strict_types=1);

namespace App\Domain\Product;

interface ProductsRepository
{
    /** @return Product[] */
    public function all(): array;

}
