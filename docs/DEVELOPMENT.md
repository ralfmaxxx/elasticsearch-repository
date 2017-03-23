# ELASTICSEARCH REPOSITORY DEVELOPMENT

## How to run project?

Just type:

```vagrant up```

```vagrant ssh```

```composer install```

### PHP

Vagrant machine delivers multiple php verions following project requirements:

```php7.0``` - to use PHP 7.0

```php7.1``` - to use PHP 7.1

Keep in mind that ```php``` is pointed to ```php7.1``` at the beginning.

### Elasticsearch

Vagrant machine provides two versions of this service (using docker containers):

```5.2.2``` - uses port ```9201``` - address: `http://elasticsearch-repository.local:9201`
```2.4.4``` - uses port ```9200``` - address: `http://elasticsearch-repository.local:9200`

## Quality and tests

Available commands:

```bin/phing phpmd``` - to run phpmd

```bin/phing phpcs``` - to run phpcs

```bin/phing phpcpd``` - to run phpcpd

```bin/phing quality``` - to run all above: phpmd, phpcs and phpcpd

```bin/phing phpspec``` - to run phpspec

```bin/phing behat``` - to run behat

```bin/phing tests``` - to run all tests: phpspec and behat

```bin/phing all``` - to run both: quality and tests

By default phing runs all task. You can list all available tasks by running: `bin/phing -l`

Only for Vagrant machine:

```bin/phing php``` - to choose PHP version should be used (`7.0` or `7.1`)

```bin/phing vagrant``` - to run all tasks for all supported PHP versions (`7.0`, `7.1`)
