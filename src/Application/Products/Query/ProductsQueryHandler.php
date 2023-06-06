<?php

declare(strict_types=1);

namespace App\Application\Products\Query;

use App\Domain\Product\ProductsRepository;

final class ProductsQueryHandler
{
    public function __construct(private readonly ProductsRepository $productsRepository)
    {
    }

    public function __invoke(ProductsQuery $query): array
    {
        return $this->productsRepository->all();
    }
}
