<?php

require_once "bootstrap.php";

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

foreach ($products as $product) {
    /** @var $product Product */
    printf("-%s\n", $product->getName());
}
