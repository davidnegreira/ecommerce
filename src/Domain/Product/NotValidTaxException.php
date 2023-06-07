<?php

declare(strict_types=1);

namespace App\Domain\Product;

use DomainException;

final class NotValidTaxException extends DomainException
{
    public static function fromTax(int $tax): self
    {
        return new self(sprintf("The tax with value %s is invalid", $tax));
    }
}
