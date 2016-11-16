<?php

$entityManager = require_once __DIR__ . '/bootstrap.php';

$cityId = $argv[1];
$cityName = $argv[2];

/** @var City $city */
$city = $entityManager->find("City", $cityId);

$city->setName($cityName);

$entityManager->flush();

echo "City was updated with ID " . $city->getId() . "\n";
