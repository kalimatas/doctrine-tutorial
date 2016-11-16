<?php

/** @var EntityManager $entityManager */
use Doctrine\ORM\EntityManager;

$entityManager = require_once __DIR__ . '/bootstrap.php';

$cityId = $argv[1];

/** @var City $city */
$city = $entityManager->find("City", $cityId);

$entityManager->remove($city);
$entityManager->flush();

echo "City was deleted" . PHP_EOL;
