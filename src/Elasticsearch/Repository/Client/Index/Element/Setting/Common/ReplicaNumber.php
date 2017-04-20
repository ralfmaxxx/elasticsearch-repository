<?php

namespace Elasticsearch\Repository\Client\Index\Element\Setting\Common;

use Elasticsearch\Repository\Client\Index\Element\Setting\SettingInterface;

class ReplicaNumber implements SettingInterface
{
    const NAME = 'number_of_replicas';

    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        self::NAME;
    }

    public function getValue(): string
    {
        $this->value;
    }
}
