<?php

namespace Elasticsearch\Repository\Client;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Repository\Client\Configuration\Hosts;

class Client implements ClientInterface
{
    private $client;

    public function __construct(Hosts $hostCollection)
    {
        $this->client = ClientBuilder::create()
            ->setHosts($hostCollection->get())
            ->build();
    }

    public function createIndex(): array
    {
        return $this->client->indices()->create();
    }
}
