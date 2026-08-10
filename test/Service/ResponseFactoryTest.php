<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Service;

// phpcs:ignore
use Laminas\Http\Response as HttpResponse;
use Laminas\Mvc\Service\ResponseFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class ResponseFactoryTest extends TestCase
{
    public function testFactoryCreatesHttpResponse(): void
    {
        $container = $this->createStub(ContainerInterface::class);
        $factory   = new ResponseFactory();
        $response  = $factory($container, 'Response');
        $this->assertInstanceOf(HttpResponse::class, $response);
    }
}
