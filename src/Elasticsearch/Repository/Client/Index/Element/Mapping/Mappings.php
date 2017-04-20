<?php

namespace Elasticsearch\Repository\Client\Index\Element\Mapping;

use Elasticsearch\Repository\Client\Index\Mapping\Type\Type;

class Mappings
{
    private $types;

    public function __construct(Type ...$types)
    {
        $this->types = $types;
    }

    public function get(): array
    {
        return $this->types;
    }
}
