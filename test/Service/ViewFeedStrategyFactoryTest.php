<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Service;

// phpcs:ignore
use Laminas\Mvc\Service\ViewFeedStrategyFactory;
use Laminas\View\Renderer\FeedRenderer;
use Laminas\View\Strategy\FeedStrategy;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class ViewFeedStrategyFactoryTest extends TestCase
{
    private function createContainer(): ContainerInterface
    {
        $renderer  = $this->createStub(FeedRenderer::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->atLeastOnce())->method('get')->with('ViewFeedRenderer')->willReturn($renderer);
        return $container;
    }

    public function testReturnsFeedStrategy()
    {
        $factory = new ViewFeedStrategyFactory();
        $result  = $factory($this->createContainer(), 'ViewFeedStrategy');
        $this->assertInstanceOf(FeedStrategy::class, $result);
    }
}
