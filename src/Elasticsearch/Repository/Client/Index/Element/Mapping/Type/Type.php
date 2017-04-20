<?php

namespace Elasticsearch\Repository\Client\Index\Mapping\Type;

use Elasticsearch\Repository\Client\Index\Element\Mapping\Type\Element\Name;

class Type
{
    private $name;

    public function __construct(Name $name)
    {
        $this->name = $name;
    }
}
