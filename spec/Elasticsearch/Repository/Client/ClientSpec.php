<?php

namespace spec\Elasticsearch\Repository\Client;

use Elasticsearch\Client as ElasticsearchClient;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Repository\Client\Client;
use Elasticsearch\Repository\Client\ClientInterface;
use Elasticsearch\Repository\Client\Configuration\Hosts;
use Elasticsearch\Repository\Client\Index\Structure\Index;
use Elasticsearch\Repository\Client\IndexActionInterface;
use Elasticsearch\Repository\Client\QueryBuilderAwareInterface;
use Elasticsearch\Repository\Client\QueryBuilderInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Client
 */
class ClientSpec extends ObjectBehavior
{
    const ELASTICSEARCH_HOST = 'http://elasticsearch.local_address:9200';

    const QUERY_BUILDER_NAME = 'query_builder_name';
    const SECOND_QUERY_BUILDER_NAME = 'second_query_builder_name';

    const EMPTY_QUERY_BUILDER_ARRAY = [];
    const NOT_EMPTY_QUERY_BUILDER_ARRAY = [
        'index' => 'index_name',
        'body' => [
            'mappings' => [],
            'settings' => [],
        ],
    ];

    function let(
        ClientBuilder $clientBuilder,
        ElasticsearchClient $elasticsearchClient
    ) {
        $clientBuilder->setHosts(Argument::any())->willReturn($clientBuilder);
        $clientBuilder->build()->willReturn($elasticsearchClient);

        $this->beConstructedWith(
            $clientBuilder,
            new Hosts(self::ELASTICSEARCH_HOST)
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);
        $this->shouldImplement(ClientInterface::class);
        $this->shouldImplement(IndexActionInterface::class);
        $this->shouldImplement(QueryBuilderAwareInterface::class);
    }

    function it_adds_query_builder(QueryBuilderInterface $queryBuilder)
    {
        $this->addQueryBuilder(self::QUERY_BUILDER_NAME, $queryBuilder);

        $this->getQueryBuilders()->shouldReturn([ self::QUERY_BUILDER_NAME => $queryBuilder]);
    }

    function it_removes_query_builder(QueryBuilderInterface $queryBuilder)
    {
        $this->addQueryBuilder(self::QUERY_BUILDER_NAME, $queryBuilder);
        $this->removeQueryBuilder(self::QUERY_BUILDER_NAME);

        $this->getQueryBuilders()->shouldReturn(self::EMPTY_QUERY_BUILDER_ARRAY);
    }

    function it_returns_all_query_builders(
        QueryBuilderInterface $firstQueryBuilder,
        QueryBuilderInterface $secondQueryBuilder
    ) {
        $this->addQueryBuilder(self::QUERY_BUILDER_NAME, $firstQueryBuilder);
        $this->addQueryBuilder(self::SECOND_QUERY_BUILDER_NAME, $secondQueryBuilder);

        $this->getQueryBuilders()->shouldReturn(
            [
                self::QUERY_BUILDER_NAME => $firstQueryBuilder,
                self::SECOND_QUERY_BUILDER_NAME => $secondQueryBuilder,
            ]
        );
    }

    function it_creates_an_index(
        QueryBuilderInterface $queryBuilder,
        ElasticsearchClient $elasticsearchClient,
        Index $index
    ) {
        $queryBuilder
            ->support($index)
            ->shouldBeCalled()
            ->willReturn(true);

        $queryBuilder
            ->build($index)
            ->shouldBeCalled()
            ->willReturn(self::NOT_EMPTY_QUERY_BUILDER_ARRAY);

        $this->addQueryBuilder(self::QUERY_BUILDER_NAME, $queryBuilder);

        $elasticsearchClient
            ->indices()
            ->shouldBeCalled()
            ->willReturn($elasticsearchClient);

        $elasticsearchClient
            ->create(self::NOT_EMPTY_QUERY_BUILDER_ARRAY)
            ->shouldBeCalled()
            ->willReturn([]);

        $this->createIndex($index);
    }
}
