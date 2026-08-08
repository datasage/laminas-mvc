<?php

namespace Laminas\Mvc\Controller\Plugin;

use Laminas\Stdlib\DispatchableInterface as Dispatchable;
use Override;

abstract class AbstractPlugin implements PluginInterface
{
    /** @var null|Dispatchable */
    protected $controller;

    /**
     * Set the current controller instance
     *
     * @return void
     */
    #[Override]
    public function setController(Dispatchable $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Get the current controller instance
     *
     * @return null|Dispatchable
     */
    #[Override]
    public function getController()
    {
        return $this->controller;
    }
}
