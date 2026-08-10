<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Service;

// phpcs:ignore
use Laminas\Mvc\Service\ViewManagerFactory;
use Laminas\Mvc\View\Http\ViewManager as HttpViewManager;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class ViewManagerFactoryTest extends TestCase
{
    private function createContainer(): ContainerInterface
    {
        $http      = $this->createStub(HttpViewManager::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->atLeastOnce())->method('get')->with('HttpViewManager')->willReturn($http);
        return $container;
    }

    public function testReturnsHttpViewManager()
    {
        $factory = new ViewManagerFactory();
        $result  = $factory($this->createContainer(), 'ViewManager');
        $this->assertInstanceOf(HttpViewManager::class, $result);
    }
}
