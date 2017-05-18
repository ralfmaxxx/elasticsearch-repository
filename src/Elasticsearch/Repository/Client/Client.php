<?php

namespace Elasticsearch\Repository\Client;

use Elasticsearch\Client as ElasticsearchClient;
use Elasticsearch\Repository\Client\Index\Structure\Index;

class Client
{
    private $client;

    private $queryBuilder;

    public function __construct(
        ElasticsearchClient $client,
        QueryBuilderInterface $queryBuilder
    ) {
        $this->client = $client;
        $this->queryBuilder = $queryBuilder;
    }

    public function createIndex(Index $index): array
    {
        if ($this->queryBuilder->support($index)) {
            return $this->client->indices()->create($this->queryBuilder->build($index));
        }
    }
}
