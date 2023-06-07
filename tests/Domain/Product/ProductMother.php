<?php

declare(strict_types=1);

namespace App\Tests\Domain\Product;

use App\Domain\Common\Uuid;
use App\Domain\Product\Product;
use App\Domain\Product\ProductTax;

final class ProductMother
{
    public static function create(): Product
    {
        return Product::register(
            Uuid::generate(),
            'random',
            'random',
            ProductTax::fromInt(10),
            10.2,
        );
    }

}
