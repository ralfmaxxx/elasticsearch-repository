<?php

use Elasticsearch\Repository\Client\Client;
use Elasticsearch\Repository\Client\Configuration\Hosts;
use Elasticsearch\Repository\Client\Index\QueryBuilder\CreateQueryBuilder;
use Elasticsearch\Repository\Client\Index\Structure\Element\Mapping\Mappings;
use Elasticsearch\Repository\Client\Index\Structure\Element\Mapping\Type\Element\Name as TypeName;
use Elasticsearch\Repository\Client\Index\Structure\Element\Mapping\Type\Type;
use Elasticsearch\Repository\Client\Index\Structure\Element\Name as IndexName;
use Elasticsearch\Repository\Client\Index\Structure\Element\Setting\Settings;
use Elasticsearch\Repository\Client\Index\Structure\Index;

require 'vendor/autoload.php';

$indexName = new IndexName('music');

$typeName = new TypeName('song');
$type = new Type($typeName);

$mappings = new Mappings($type);
$settings = new Settings();

$index = new Index($indexName, $settings, $mappings);

$client = new Client(
    new Hosts('http://localhost:9200')
);

$client->addQueryBuilder('createIndex', new CreateQueryBuilder());

$client->createIndex($index);
