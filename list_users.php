<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/** @var EntityManager $entityManager */
$entityManager = require_once __DIR__ . '/bootstrap.php';

/** @var EntityRepository $userRepository */
$userRepository = $entityManager->getRepository(User::class);
$users = $userRepository->findAll();

foreach ($users as $user) {
    /** @var $user User */
    printf("%d-%s-%s\n", $user->getId(), $user->getName(), $user->getCity()->getName());
}

/** @var CityRepository $cityRepository */
//$cityRepository = $entityManager->getRepository(City::class);
//$cityByName = $cityRepository->byName($user->getCity()->getName());
//echo $cityByName->getId() . PHP_EOL;
