<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Laminas\Stdlib\DispatchableInterface;
use Laminas\Stdlib\RequestInterface;
use Laminas\Stdlib\ResponseInterface as Response;
use Override;

class UneventfulController implements DispatchableInterface
{
    #[Override]
    public function dispatch(RequestInterface $request, ?Response $response = null)
    {
    }
}
