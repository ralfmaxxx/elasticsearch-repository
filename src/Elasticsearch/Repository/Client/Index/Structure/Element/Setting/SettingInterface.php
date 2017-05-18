<?php

namespace Elasticsearch\Repository\Client\Index\Structure\Element\Setting;

interface SettingInterface
{
    public function getName(): string;

    public function getValue(): string;
}
