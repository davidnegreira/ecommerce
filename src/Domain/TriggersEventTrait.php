<?php

namespace App\Domain;

trait TriggersEventTrait
{
    /** @var DomainEvent[] */
    private array $domainEvents = [];

    /** @return DomainEvent[] */
    public function domainEvents(): array
    {
        return $this->domainEvents;
    }

    public function notifyDomainEvent(DomainEvent $domainEvent): void
    {
        $this->domainEvents[] = $domainEvent;
    }

    public function resetDomainEvent(): void
    {
        $this->domainEvents = [];
    }
}
