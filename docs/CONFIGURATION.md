# CONFIGURATION

## How to configure connection?

Can be done using plain PHP object:
```
use Elasticsearch\Repository\Configuration\Connection;

$connection = new Connection(...);
```

Or from `XML`:

```
use Elasticsearch\Repository\Configuration\Factory\XmlConnectionFactory;

$xmlConnectionFactory = new XmlConnectionFactory('path/to/connection.xml');
$connection = $xmlConnectionFactory->create();
```

Or from `YML`:

```
use Elasticsearch\Repository\Configuration\Factory\YmlConnectionFactory;

$ymlConnectionFactory = new YmlConnectionFactory('path/to/configuration.yml');
$connection = $xmlConfigurationFactory->create();
```
