<?php

namespace Elasticsearch\Repository\Client\Index\Structure;

use Elasticsearch\Repository\Client\Index\Structure\Element\Mapping\Mappings;
use Elasticsearch\Repository\Client\Index\Structure\Element\Name;
use Elasticsearch\Repository\Client\Index\Structure\Element\Setting\Settings;

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

    public function getName(): Name
    {
        return $this->name;
    }

    public function getSettings(): Settings
    {
        return $this->settings;
    }

    public function getMappings(): Mappings
    {
        return $this->mappings;
    }
}
