<?php

namespace Elasticsearch\Repository\Client\QueryBuilder;

class Buildable
{
    private $object;

    private $metadata;

    public function __construct($object, Metadata $metadata)
    {
        $this->object = $object;
        $this->metadata = $metadata;
    }
}
