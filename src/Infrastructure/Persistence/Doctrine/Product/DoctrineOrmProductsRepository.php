<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineOrmProductsRepository implements ProductsRepository
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function all(): array
    {
        return $this->entityManager->getRepository(Product::class)
            ->findBy(criteria: ['free' => 1], orderBy: ['seats.value' => 'ASC']);
    }

    public function save(Product $car): void
    {
        $this->entityManager->persist($car);
    }
}
