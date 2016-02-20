<?php

require_once "bootstrap.php";

/** @var BugRepository $bugRepository */
$bugRepository = $entityManager->getRepository('Bug');
$bugs = $bugRepository->getRecentBugs();

/** @var $bug Bug */
foreach ($bugs as $bug) {
    echo $bug->getDescription() . " - " . $bug->getCreated()->format('d.m.Y') . "\n";
    echo "\tReported by: " . $bug->getReporter()->getName() . "\n";
    echo "\tAssigned to: " . $bug->getEngineer()->getName() . "\n";
    foreach ($bug->getProducts() as $product) {
        echo "\tPlatform: " . $product->getName() . "\n";
    }
    echo PHP_EOL;
}
