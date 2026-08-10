<?php

declare(strict_types=1);

namespace LaminasTest\Mvc;

use Laminas\Mvc\Exception\InvalidMiddlewareException;
use PHPUnit\Framework\TestCase;

use function uniqid;

final class InvalidMiddlewareExceptionTest extends TestCase
{
    public function testFromMiddlewareName(): void
    {
        $middlewareName = uniqid('middlewareName', true);
        $exception      = InvalidMiddlewareException::fromMiddlewareName($middlewareName);

        $this->assertInstanceOf(InvalidMiddlewareException::class, $exception);
        $this->assertSame('Cannot dispatch middleware ' . $middlewareName, $exception->getMessage());
        $this->assertSame($middlewareName, $exception->toMiddlewareName());
    }

    public function testToMiddlewareNameWhenNotSet(): void
    {
        $exception = new InvalidMiddlewareException();
        $this->assertSame('', $exception->toMiddlewareName());
    }

    public function testFromNull(): void
    {
        $exception = InvalidMiddlewareException::fromNull();

        $this->assertInstanceOf(InvalidMiddlewareException::class, $exception);
        $this->assertSame('Middleware name cannot be null', $exception->getMessage());
        $this->assertSame('', $exception->toMiddlewareName());
    }
}
