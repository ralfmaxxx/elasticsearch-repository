<?php

namespace Elasticsearch\Repository\Client\Index\Structure\Element\Mapping;

use Elasticsearch\Repository\Client\Index\Structure\Element\Mapping\Type\Type;

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
