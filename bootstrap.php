<?php

require_once 'vendor/autoload.php';

use Doctrine\Common\Cache\RedisCache;
use Doctrine\DBAL\Logging\EchoSQLLogger;
use Doctrine\ORM\Cache\DefaultCacheFactory;
use Doctrine\ORM\Cache\RegionsConfiguration;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/src'], $isDevMode);
$config->setSQLLogger(new EchoSQLLogger());

$redis = new Redis();
$redis->connect('localhost');

$cache = new RedisCache();
$cache->setRedis($redis);
$cacheFactory = new DefaultCacheFactory(new RegionsConfiguration(), $cache);

$config->setSecondLevelCacheEnabled();
$config->getSecondLevelCacheConfiguration()->setCacheFactory($cacheFactory);

$conn = [
    //'host' => '127.0.0.1',
    //'driver' => 'pdo_mysql',
    //'user' => 'root',
    //'password' => 'root',
    //'dbname' => 'doctrine_tutorial',
    'driver' => 'pdo_sqlite',
    'path'   => __DIR__ . '/db.sqlite',
];

$entityManager = EntityManager::create($conn, $config);

return $entityManager;
