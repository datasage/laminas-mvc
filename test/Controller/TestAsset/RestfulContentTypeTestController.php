<?php

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Laminas\Mvc\Controller\AbstractRestfulController;
use Override;

class RestfulContentTypeTestController extends AbstractRestfulController
{
    /**
     * Update an existing resource
     */
    #[Override]
    public function update(mixed $id, mixed $data): array
    {
        return [
            'id'   => $id,
            'data' => $data,
        ];
    }
}
