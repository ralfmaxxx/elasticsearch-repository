<?php

namespace spec\Elasticsearch\Repository\Client\Configuration;

use Elasticsearch\Repository\Client\Configuration\Hosts;
use PhpSpec\ObjectBehavior;

/**
 * @mixin Hosts
 */
class HostsSpec extends ObjectBehavior
{
    const FIRST_CDN = 'http://test.com:9200';

    const SECOND_CDN = 'http://example.com';

    function it_is_initializable()
    {
        $this->shouldHaveType(Hosts::class);
    }

    function it_has_host_collection()
    {
        $this->beConstructedWith(self::FIRST_CDN, self::SECOND_CDN);

        $this->get()->shouldReturn([self::FIRST_CDN, self::SECOND_CDN]);
    }
}
