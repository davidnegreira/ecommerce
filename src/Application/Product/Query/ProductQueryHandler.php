<?php

declare(strict_types=1);

namespace App\Application\Product\Query;

use App\Domain\Product\ProductRepository;

final class ProductQueryHandler
{
    public function __construct(private readonly ProductRepository $productsRepository)
    {
    }

    public function __invoke(ProductQuery $query): array
    {
        return $this->productsRepository->all();
    }
}
