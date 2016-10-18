<?php

// products.php
$entityManager = require_once __DIR__ . '/bootstrap.php';

$dql = <<<QUERY
SELECT p.id, p.name, count(b.id) as openBugs
FROM Bug b
JOIN b.products p
WHERE b.status = 'OPEN'
GROUP by p.id
QUERY;
;

$productBugs = $entityManager->createQuery($dql)->getScalarResult();

foreach ($productBugs as $productBug) {
    echo $productBug['name']." has " . $productBug['openBugs'] . " open bugs!\n";
}
