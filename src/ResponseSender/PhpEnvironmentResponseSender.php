<?php

namespace Laminas\Mvc\ResponseSender;

use Laminas\Http\PhpEnvironment\Response;
use Override;

class PhpEnvironmentResponseSender extends HttpResponseSender
{
    /**
     * Send php environment response
     *
     * @return PhpEnvironmentResponseSender
     */
    #[Override]
    public function __invoke(SendResponseEvent $event)
    {
        $response = $event->getResponse();
        if (! $response instanceof Response) {
            return $this;
        }

        $this->sendHeaders($event)
             ->sendContent($event);
        $event->stopPropagation(true);
        return $this;
    }
}
