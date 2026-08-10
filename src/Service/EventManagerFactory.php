<?php

namespace Laminas\Mvc\Service;

// phpcs:ignore
use Laminas\EventManager\EventManager;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Override;
use Psr\Container\ContainerInterface;

class EventManagerFactory implements FactoryInterface
{
    /**
     * Create an EventManager instance
     *
     * Creates a new EventManager instance, seeding it with a shared instance
     * of SharedEventManager.
     *
     * @param  string $requestedName
     * @param  null|array $options
     * @return EventManager
     */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $shared = $container->has('SharedEventManager') ? $container->get('SharedEventManager') : null;

        return new EventManager($shared);
    }
}
