<?php

use Doctrine\ORM\AbstractQuery;

require_once "bootstrap.php";

$driverRepository = $entityManager->getRepository(Driver::class);

///** @var Driver $dri */
//$dri = $driverRepository->find(1);
//foreach ($dri->getCars() as $car) {
//    /** @var Car $car */
//    echo $car->getBrand() . ' ' . $car->getModel() . PHP_EOL;
//}
//return;

$qb = $entityManager->createQueryBuilder();

/** @var $driver Driver */
$driver = $qb->select('d, dr')
    ->from('Driver', 'd')
    ->leftJoin('d.cars', 'dr')
    ->where('d.id = 1')
    ->getQuery()
    ->getSingleResult();

printf("%s:\n", $driver->getName());
foreach ($driver->getCars() as $car) {
    printf("%s %s\n", $car->getBrand(), $car->getModel());
}

echo PHP_EOL;

$qb = $entityManager->createQueryBuilder();
$drivers = $qb->select('d, dr')
    ->from('Driver', 'd')
    ->leftJoin('d.cars', 'dr')
    ->getQuery()
    ->getResult();

foreach ($drivers as $driver) {
    printf("%s:\n", $driver->getName());
    foreach ($driver->getCars() as $car) {
        printf("%s %s\n", $car->getBrand(), $car->getModel());
    }
}

//$qb = $entityManager->createQueryBuilder();
//$r = $qb->select('dr, c')
//    ->from('DriverRide', 'dr')
//    ->leftJoin('dr.car', 'c')
//    ->where('dr.driver = 1')
//    ->getQuery()
//    ->getResult();

//var_dump($r);


echo PHP_EOL;

return;

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
