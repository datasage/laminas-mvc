<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller;

use Laminas\EventManager\EventManagerAwareInterface;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\Controller\AbstractController;
use Laminas\Mvc\InjectApplicationEventInterface;
use Laminas\Stdlib\DispatchableInterface;
use LaminasTest\Mvc\Controller\TestAsset\AbstractControllerStub;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;
use ReflectionProperty;

#[CoversClass(AbstractController::class)]
class AbstractControllerTest extends TestCase
{
    /** @var AbstractController|PHPUnit_Framework_MockObject_MockObject */
    private $controller;

    /**
     * {@inheritDoc}
     */
    #[Override]
    protected function setUp(): void
    {
        $this->controller = new AbstractControllerStub();
    }

    public function testSetEventManagerWithDefaultIdentifiers(): void
    {
        /** @var EventManagerInterface|PHPUnit_Framework_MockObject_MockObject $eventManager */
        $eventManager = $this->createMock(EventManagerInterface::class);

        $eventManager
            ->expects($this->once())
            ->method('setIdentifiers')
            ->with($this->logicalNot($this->containsEqual('customEventIdentifier')));

        $this->controller->setEventManager($eventManager);
    }

    public function testSetEventManagerWithCustomStringIdentifier(): void
    {
        /** @var EventManagerInterface|PHPUnit_Framework_MockObject_MockObject $eventManager */
        $eventManager = $this->createMock(EventManagerInterface::class);

        $eventManager->expects($this->once())->method('setIdentifiers')
            ->with($this->containsEqual('customEventIdentifier'));

        $reflection = new ReflectionProperty($this->controller, 'eventIdentifier');

        $reflection->setValue($this->controller, 'customEventIdentifier');

        $this->controller->setEventManager($eventManager);
    }

    public function testSetEventManagerWithMultipleCustomStringIdentifier(): void
    {
        /** @var EventManagerInterface|PHPUnit_Framework_MockObject_MockObject $eventManager */
        $eventManager = $this->createMock(EventManagerInterface::class);

        $eventManager->expects($this->once())->method('setIdentifiers')->with($this->logicalAnd(
            $this->containsEqual('customEventIdentifier1'),
            $this->containsEqual('customEventIdentifier2')
        ));

        $reflection = new ReflectionProperty($this->controller, 'eventIdentifier');

        $reflection->setValue($this->controller, ['customEventIdentifier1', 'customEventIdentifier2']);

        $this->controller->setEventManager($eventManager);
    }

    public function testSetEventManagerWithDefaultIdentifiersIncludesImplementedInterfaces(): void
    {
        /** @var EventManagerInterface|PHPUnit_Framework_MockObject_MockObject $eventManager */
        $eventManager = $this->createMock(EventManagerInterface::class);

        $eventManager
            ->expects($this->once())
            ->method('setIdentifiers')
            ->with($this->logicalAnd(
                $this->containsEqual(EventManagerAwareInterface::class),
                $this->containsEqual(DispatchableInterface::class),
                $this->containsEqual(InjectApplicationEventInterface::class)
            ));

        $this->controller->setEventManager($eventManager);
    }

    public function testSetEventManagerWithDefaultIdentifiersIncludesExtendingClassNameAndNamespace(): void
    {
        /** @var EventManagerInterface|PHPUnit_Framework_MockObject_MockObject $eventManager */
        $eventManager = $this->createMock(EventManagerInterface::class);

        $eventManager
            ->expects($this->once())
            ->method('setIdentifiers')
            ->with($this->logicalAnd(
                $this->containsEqual(AbstractController::class),
                $this->containsEqual(AbstractControllerStub::class),
                $this->containsEqual('LaminasTest'),
                $this->containsEqual('LaminasTest\\Mvc\\Controller\\TestAsset')
            ));

        $this->controller->setEventManager($eventManager);
    }
}
