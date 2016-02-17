<?php

require_once "bootstrap.php";

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

foreach ($products as $product) {
    /** @var $product Product */
    printf("%d-%s\n", $product->getId(), $product->getName());
}
