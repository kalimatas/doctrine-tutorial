<?php

$entityManager = require_once __DIR__ . '/bootstrap.php';

$newCity = $argv[1];

$city = new City();
$city->setName($newCity);

$entityManager->persist($city);
$entityManager->flush();

echo "Created City with ID " . $city->getId() . "\n";
