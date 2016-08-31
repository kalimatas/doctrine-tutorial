<?php

require_once "bootstrap.php";

$driverRepository = $entityManager->getRepository(Driver::class);
$drivers = $driverRepository->findAll();

echo 'Drivers' . PHP_EOL;
foreach ($drivers as $driver) {
    /** @var $driver Driver */
    printf("%d-%s\n", $driver->getId(), $driver->getName());
}


echo PHP_EOL;

echo 'Cars' . PHP_EOL;

$carRepository = $entityManager->getRepository(Car::class);
$cars = $carRepository->findAll();

foreach ($cars as $car) {
    /** @var $car Car */
    printf("%s-%s\n", $car->getBrand(), $car->getModel());
    foreach ($car->getCarRides() as $cr) {
        /** @var $cr DriverRide */
        printf("%s-%s\n", $cr->getCar()->getBrand(), $cr->getDriver()->getId());
    }
}

echo PHP_EOL;

//$bugs = $driverRepository->getRecentBugs();

//foreach ($bugs as $bug) {
//    echo $bug->getDescription() . " - " . $bug->getCreated()->format('d.m.Y') . "\n";
//    echo "\tReported by: " . $bug->getReporter()->getName() . "\n";
//    echo "\tAssigned to: " . $bug->getEngineer()->getName() . "\n";
//    foreach ($bug->getProducts() as $product) {
//        echo "\tPlatform: " . $product->getName() . "\n";
//    }
//    echo PHP_EOL;
//}
