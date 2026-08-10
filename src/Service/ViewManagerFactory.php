<?php

namespace Laminas\Mvc\Service;

// phpcs:ignore
use Laminas\Mvc\View\Http\ViewManager as HttpViewManager;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Override;
use Psr\Container\ContainerInterface;

class ViewManagerFactory implements FactoryInterface
{
    /**
     * Create and return a view manager.
     *
     * @param  string $requestedName
     * @param  null|array $options
     * @return HttpViewManager
     */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return $container->get('HttpViewManager');
    }
}
