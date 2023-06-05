<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Messenger\Event;

use App\Application\Bus\Event\EventBus;
use App\Domain\DomainEvent;

final class InMemoryEventBus implements EventBus
{
    public function __construct(
        /** @param DomainEvent[] $events */
        private array $events = []
    ) {
    }

    public function events(): array
    {
        return $this->events;
    }

    public function reset(): void
    {
        $this->events = [];
    }

    public function notify(DomainEvent $event): void
    {
        $this->events[] = $event;
    }

    public function notifyAll(array $events): void
    {
        array_walk($events,fn (DomainEvent $event) => $this->notify($event));

    }
}