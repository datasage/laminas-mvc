<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\TestAsset;

// phpcs:ignore
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\AbstractFactoryInterface;
use Override;

use function class_exists;

class MiddlewareAbstractFactory implements AbstractFactoryInterface
{
    public array $classmap = [
        'test' => Middleware::class,
    ];

    /** @inheritDoc */
    #[Override]
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (! isset($this->classmap[$name])) {
            return false;
        }

        $classname = $this->classmap[$name];
        return class_exists($classname);
    }

    /** @inheritDoc */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $classname = $this->classmap[$name];
        return new $classname();
    }
}
