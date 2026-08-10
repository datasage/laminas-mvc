<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\Plugin\TestAsset;

// phpcs:ignore
use Laminas\ServiceManager\Factory\FactoryInterface;
use Override;
use Psr\Container\ContainerInterface;

class SamplePluginFactory implements FactoryInterface
{
    /** @inheritDoc */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new SamplePlugin();
    }
}
