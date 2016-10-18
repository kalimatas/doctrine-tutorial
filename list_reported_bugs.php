<?php

/** @var EntityManager $entityManager */
use Doctrine\ORM\EntityManager;

$entityManager = require_once __DIR__ . '/bootstrap.php';

/** @var UserRepository $userRepository */
$userRepository = $entityManager->getRepository('User');
/** @var User $reporter */
$reporter = $userRepository->find($argv[1]);

echo $reporter->getName() . PHP_EOL;
//$reporter->setName('test+' . time());
//echo $reporter->getReportedBugs()->count() . PHP_EOL;

/** @var Bug $firstBug */
$firstBug = $reporter->getReportedBugs()->first();
$firstBug->setDescription('description+' . time());

$entityManager->persist($reporter);
$entityManager->flush();

/** @var $bug Bug */
/*foreach ($reporter->getReportedBugs() as $bug) {
    echo $bug->getDescription() . " - " . $bug->getCreated()->format('d.m.Y') . "\n";
    echo "\tReported by: " . $bug->getReporter()->getName() . "\n";
    echo "\tAssigned to: " . $bug->getEngineer()->getName() . "\n";
    foreach ($bug->getProducts() as $product) {
        echo "\tPlatform: " . $product->getName() . "\n";
    }
    echo PHP_EOL;
}*/

echo PHP_EOL;
