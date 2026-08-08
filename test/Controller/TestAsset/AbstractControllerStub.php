<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Laminas\Mvc\Controller\AbstractController;
use Laminas\Mvc\MvcEvent;
use Override;

class AbstractControllerStub extends AbstractController
{
    #[Override]
    public function onDispatch(MvcEvent $e): void
    {
        // noop
    }
}
