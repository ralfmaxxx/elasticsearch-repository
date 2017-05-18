<?php

namespace Elasticsearch\Repository\Client\QueryBuilder;

interface QueryBuilderInterface
{
    public function build(Buildable $object): array;

    public function support($object): bool;
}
