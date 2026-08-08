<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Laminas\Http\Request as HttpRequest;
use Override;

use function strtoupper;

class Request extends HttpRequest
{
    /**
     * Override the method setter, to allow arbitrary HTTP methods
     *
     * @param  string $method
     * @return Request
     */
    #[Override]
    public function setMethod($method)
    {
        $method       = strtoupper($method);
        $this->method = $method;
        return $this;
    }
}
