<?php

use Doctrine\ORM\EntityRepository;

$entityManager = require_once __DIR__ . '/bootstrap.php';

/** @var EntityRepository $userRepository */
$userRepository = $entityManager->getRepository('User');
$users = $userRepository->findAll();

foreach ($users as $user) {
    /** @var $user User */
    printf("%d-%s-%s\n", $user->getId(), $user->getName(), $user->getCity()->getName());
}
