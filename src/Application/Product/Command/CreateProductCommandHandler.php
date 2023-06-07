<?php

declare(strict_types=1);

namespace App\Application\Product\Command;

use App\Domain\Common\Uuid;
use App\Domain\Product\Product;
use App\Domain\Product\ProductRepository;
use App\Domain\Product\ProductTax;

final class CreateProductCommandHandler
{
    public function __construct(private readonly ProductRepository $productRepository)
    {
    }

    public function __invoke(CreateProductCommand $command): void
    {
        $product = Product::register(
            Uuid::fromString($command->productId),
            $command->name,
            $command->description,
            ProductTax::fromInt($command->tax),
            $command->price
        );

        $this->productRepository->save($product);
    }
}
