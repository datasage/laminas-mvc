<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\Plugin\TestAsset;

// phpcs:ignore
use Laminas\ServiceManager\Factory\FactoryInterface;
use Override;
use Psr\Container\ContainerInterface;

class SamplePluginWithConstructorFactory implements FactoryInterface
{
    protected array $options;

    /** @inheritDoc */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new SamplePluginWithConstructor($options);
    }

    public function setCreationOptions(array $options): void
    {
        $this->options = $options;
    }
}
