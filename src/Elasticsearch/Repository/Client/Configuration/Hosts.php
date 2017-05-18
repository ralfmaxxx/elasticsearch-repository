<?php

namespace Elasticsearch\Repository\Client\Configuration;

final class Hosts
{
    private $hosts;

    public function __construct(string ...$hosts)
    {
        $this->hosts = $hosts;
    }

    /**
     * @return string[]
     */
    public function get(): array
    {
        return $this->hosts;
    }
}
