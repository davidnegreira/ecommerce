<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineOrmProductRepository implements ProductRepository
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function all(): array
    {
        return $this->entityManager->getRepository(Product::class)->findAll();
    }

    public function save(Product $car): void
    {
        $this->entityManager->persist($car);
    }
}
