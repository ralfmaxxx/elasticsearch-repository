<?php

namespace Elasticsearch\Repository\Client;

interface ClientInterface
{
    public function createIndex(): array;
}
