<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\TestAsset;

use Laminas\Mvc\MvcEvent;

/**
 * Mockable stand-in for an invokable MVC event listener.
 *
 * Tests used to build these with getMockBuilder(stdClass::class)->addMethods(['__invoke']),
 * which phpunit 11 deprecated and phpunit 12 removed. Mocking a declared interface gives
 * the same expectations with a real contract behind them.
 */
interface MvcEventListenerInterface
{
    public function __invoke(MvcEvent $event): mixed;
}
