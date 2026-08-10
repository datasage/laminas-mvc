<?php

namespace Laminas\Mvc\Service;

// phpcs:ignore
use Laminas\Mvc\SendResponseListener;

use Psr\Container\ContainerInterface;

class SendResponseListenerFactory
{
    /**
     * @return SendResponseListener
     */
    public function __invoke(ContainerInterface $container)
    {
        $listener = new SendResponseListener();
        $listener->setEventManager($container->get('EventManager'));
        return $listener;
    }
}
