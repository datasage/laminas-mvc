<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Laminas\EventManager\EventInterface as Event;
use Laminas\Mvc\InjectApplicationEventInterface;
use Laminas\Stdlib\DispatchableInterface;
use Laminas\Stdlib\RequestInterface as Request;
use Laminas\Stdlib\ResponseInterface as Response;
use Override;

class UnlocatableEventfulController implements DispatchableInterface, InjectApplicationEventInterface
{
    protected Event $event;

    #[Override]
    public function setEvent(Event $event): void
    {
        $this->event = $event;
    }

    #[Override]
    public function getEvent(): Event
    {
        return $this->event;
    }

    #[Override]
    public function dispatch(Request $request, ?Response $response = null)
    {
    }
}
