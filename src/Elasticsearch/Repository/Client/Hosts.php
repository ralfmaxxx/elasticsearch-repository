<?php

namespace Elasticsearch\Repository\Client;

class Hosts
{
    private $cdnHosts;

    public function __construct(string ...$cdnHosts)
    {
        $this->cdnHosts = $cdnHosts;
    }

    public function get(): array
    {
        return $this->cdnHosts;
    }
}
