<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

// phpcs:ignore
use Laminas\ServiceManager\Factory\AbstractFactoryInterface;
use Override;
use Psr\Container\ContainerInterface;

class UnlocatableControllerLoaderAbstractFactory implements AbstractFactoryInterface
{
    /** @inheritDoc */
    #[Override]
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        return false;
    }

    /** @inheritDoc */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
    }
}
