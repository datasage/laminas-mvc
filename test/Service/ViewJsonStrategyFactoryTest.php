<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Service;

// phpcs:ignore
use Laminas\Mvc\Service\ViewJsonStrategyFactory;
use Laminas\View\Renderer\JsonRenderer;
use Laminas\View\Strategy\JsonStrategy;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class ViewJsonStrategyFactoryTest extends TestCase
{
    private function createContainer(): ContainerInterface
    {
        $renderer  = $this->createStub(JsonRenderer::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->atLeastOnce())->method('get')->with('ViewJsonRenderer')->willReturn($renderer);
        return $container;
    }

    public function testReturnsJsonStrategy(): void
    {
        $factory = new ViewJsonStrategyFactory();
        $result  = $factory($this->createContainer(), 'ViewJsonStrategy');
        $this->assertInstanceOf(JsonStrategy::class, $result);
    }
}
