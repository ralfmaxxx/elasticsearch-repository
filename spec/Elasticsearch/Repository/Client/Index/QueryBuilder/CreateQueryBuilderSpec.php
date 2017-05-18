<?php

namespace spec\Elasticsearch\Repository\Client\Index\QueryBuilder;

use Elasticsearch\Repository\Client\Index\QueryBuilder\CreateQueryBuilder;
use Elasticsearch\Repository\Client\Index\Structure\Index;
use Elasticsearch\Repository\Client\QueryBuilderInterface;
use PhpSpec\ObjectBehavior;

/**
 * @mixin CreateQueryBuilder
 */
class CreateQueryBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CreateQueryBuilder::class);
        $this->shouldImplement(QueryBuilderInterface::class);
    }

    function it_supports_index_object_only(
        Index $index
    ) {
        $this->support($index)->shouldReturn(true);
        $this->support($index)->shouldReturn(true);
    }
}
