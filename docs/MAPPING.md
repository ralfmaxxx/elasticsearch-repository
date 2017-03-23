# MAPPING

## Mapping definition

Can be done using YML:
```
use Elasticsearch\Repository\Configuration\Factory\XmlMappingFactory;

$xmlMappingFactory = new XmlMappingFactory('path/to/mapping.xml');
$mapping = $xmlMappingFactory->create();
```

Or with YML:
```
use Elasticsearch\Repository\Configuration\Factory\YmlMappingFactory;

$ymlMappingFactory = new YmlMappingFactory('path/to/mapping.yml');
$mapping = $ymlMappingFactory->create();
```

Or with annotations:
```
use Elasticsearch\Repository\Configuration\Factory\AnnotationMappingFactory;

$annotationMappingFactory = new AnnotationMappingFactory('path/to/mapping.yml');
$mapping = $annotationMappingFactory->create();
```
In this case mapping could be defined like below:

```
<?php
namespace Project\Document;

@Elasticsearch\Index(name="product", type="song")
class Song
{
    @Elasticsearch\Property(type="string", analyzer="standard")
    private $name;
    
    @Elasticsearch\Property(type="integer")
    private $price;
}
```

## Mapping definition commands [still draft]

For creating

```
bin/console elasticsearch:mappings:create
```
