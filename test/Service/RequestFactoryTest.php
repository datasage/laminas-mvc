<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Service;

// phpcs:ignore
use Laminas\Http\Request as HttpRequest;
use Laminas\Mvc\Service\RequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class RequestFactoryTest extends TestCase
{
    public function testFactoryCreatesHttpRequest(): void
    {
        $factory   = new RequestFactory();
        $container = $this->createStub(ContainerInterface::class);
        $request   = $factory($container, 'Request');
        $this->assertInstanceOf(HttpRequest::class, $request);
    }
}
