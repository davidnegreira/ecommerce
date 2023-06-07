<?php

declare(strict_types=1);

namespace App\Application\Product\Query;

use App\Application\Bus\Query\Query;

final class ProductQuery extends Query
{
    public function __construct(public readonly ?string $name)
    {
    }
}
