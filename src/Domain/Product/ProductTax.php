<?php

declare(strict_types=1);

namespace App\Domain\Product;

final class ProductTax
{
    private const VALID_TAX = [4, 10, 21];
    private readonly int $tax;


    private function __construct(int $tax)
    {
        $this->assertValidTax($tax);
        $this->tax = $tax;
    }

    private function assertValidTax(int $tax): void
    {
        if (!in_array($tax, self::VALID_TAX)) {
            throw NotValidTaxException::fromTax($tax);
        }
    }

    public static function fromInt($tax): self
    {
        return new self($tax);
    }

    public function toInt(): int
    {
        return $this->tax;
    }
}
