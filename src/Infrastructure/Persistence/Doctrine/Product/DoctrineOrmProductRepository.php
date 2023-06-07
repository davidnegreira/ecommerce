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

    public function save(Product $product): void
    {
        $this->entityManager->persist($product);
    }

    public function findByName(?string $name, int $page): array
    {
        $query = $this->entityManager->getRepository(Product::class)
            ->createQueryBuilder('product')
            ->setFirstResult(($page - 1) * self::PAGE_SIZE)
            ->setMaxResults(self::PAGE_SIZE);

        if ($name) {
            $query->where('product.name like :name')->setParameter('name', '%' . $name . '%');
        }

        return $query->getQuery()->getResult();
    }
}
