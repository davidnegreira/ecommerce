<?php

declare(strict_types=1);

namespace App\Domain\Common;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\UuidInterface;

class Uuid
{
    private function __construct(public readonly string $id)
    {
    }

    public static function fromString(string $uuid): static
    {
        if (!RamseyUuid::isValid($uuid)) {
            throw new \InvalidArgumentException('The value does not represent a valid identifier based in Uuid');
        }

        return new static($uuid);
    }

    public static function generate(): static
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public static function fromUuid(UuidInterface $uuid): static
    {
        return new static($uuid->toString());
    }

    final public function equals(self $other): bool
    {
        return $this->id === $other->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
