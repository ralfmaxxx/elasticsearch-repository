<?php

namespace Elasticsearch\Repository\Client\Index\Structure\Element\Setting\Common;

use Elasticsearch\Repository\Client\Index\Structure\Element\Setting\SettingInterface;

class ShardNumber implements SettingInterface
{
    const NAME = 'number_of_shards';

    private $value;

    public function __construct(int $value)
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
