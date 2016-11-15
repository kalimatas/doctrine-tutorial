<?php

$entityManager = require_once __DIR__ . '/bootstrap.php';

$newUsername = $argv[1];
$cityId = $argv[2];

$user = new User();
$user->setName($newUsername);

/** @var City $city */
$city = $entityManager->find("City", $cityId);

$user->setCity($city);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";
