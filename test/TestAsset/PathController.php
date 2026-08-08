<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\TestAsset;

use Laminas\Stdlib\DispatchableInterface;
use Laminas\Stdlib\RequestInterface as Request;
use Laminas\Stdlib\ResponseInterface as Response;
use Override;

class PathController implements DispatchableInterface
{
    /** @inheritDoc */
    #[Override]
    public function dispatch(Request $request, ?Response $response = null)
    {
        if (! $response) {
            $response = new HttpResponse();
        }
        $response->setContent(__METHOD__);
        return $response;
    }
}
