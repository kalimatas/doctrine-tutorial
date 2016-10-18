<?php

$entityManager = require_once __DIR__ . '/bootstrap.php';

$product = new Product();
$product->setName($argv[1]);

$entityManager->persist($product);
$entityManager->flush();

printf("Created product with id=%d\n", $product->getId());
