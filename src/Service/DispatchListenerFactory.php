<?php

namespace Laminas\Mvc\Service;

// phpcs:ignore
use Laminas\Mvc\DispatchListener;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Override;
use Psr\Container\ContainerInterface;

class DispatchListenerFactory implements FactoryInterface
{
    /**
     * Create the default dispatch listener.
     *
     * @param  string $requestedName
     * @param  null|array $options
     * @return DispatchListener
     */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new DispatchListener($container->get('ControllerManager'));
    }
}
