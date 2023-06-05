<?php

declare(strict_types=1);

namespace App\Application\Products\Query;

use App\Application\Bus\Query\Query;

final class ProductsQuery extends Query
{
    public function __construct(public readonly ?string $name)
    {
    }
}
