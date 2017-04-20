<?php

namespace Elasticsearch\Repository\Client\Index\Element\Setting;

class Settings
{
    private $settings;

    public function __construct(SettingInterface ...$settings)
    {
        $this->settings = $settings;
    }

    public function get(): array
    {
        return $this->settings;
    }
}
