<?php

namespace Elasticsearch\Repository\Client\QueryBuilder;

class Metadata
{
    const ACTION_CREATE = 'create';

    private $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
