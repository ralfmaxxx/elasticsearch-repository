<?php

namespace Elasticsearch\Repository\Client\Index;

use Elasticsearch\Repository\Client\Index\Element\Name;
use Elasticsearch\Repository\Client\Index\Element\Setting\Settings;
use Elasticsearch\Repository\Client\Index\Element\Mapping\Mappings;

class Index
{
    private $name;

    private $settings;

    private $mappings;

    public function __construct(Name $name, Settings $settings, Mappings $mappings)
    {
        $this->name = $name;
        $this->settings = $settings;
        $this->mappings = $mappings;
    }
}
