<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/src'], $isDevMode);

$conn = [
    'driver' => 'pdo_sqlite',
    'path'   => __DIR__ . '/db.sqlite',
];

$entityManager = EntityManager::create($conn, $config);