<?php

declare(strict_types=1);

namespace App\Application\Product\Query;

use App\Domain\Product\ProductRepository;

final class ListProductQueryHandler
{
    public function __construct(private readonly ProductRepository $productsRepository)
    {
    }

    public function __invoke(ListProductQuery $query): array
    {
        return $this->productsRepository->findByName($query->name, $this->getValidPage($query->page));
    }

    private function getValidPage(int $page): int
    {
        return empty($page) ? 1 : $page;
    }
}
