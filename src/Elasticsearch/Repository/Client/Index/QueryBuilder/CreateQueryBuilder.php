<?php

namespace Elasticsearch\Repository\Client\Index\QueryBuilder;

use Elasticsearch\Repository\Client\Index\Structure\Index;
use Elasticsearch\Repository\Client\QueryBuilderInterface;

class CreateQueryBuilder implements QueryBuilderInterface
{
    public static function createFrom(Index $index): self
    {
        $body = [
            'index' => $index->getName()->get(),
            'body' => [
                'settings' => [],
                'mappings' => [],
            ],
        ];

        return new self($body);
    }

    /**
     * @param Index $object
     */
    public function build($object): array
    {
        return [
            'index' => $object->getName()->get(),
            'body' => [],
        ];
    }

    public function support($object): bool
    {
        return $object instanceof Index;
    }
}
