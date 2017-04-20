<?php

namespace Elasticsearch\Repository\Client\Index\Element;

class Name
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }
}
