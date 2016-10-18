<?php

// show_bug.php
$entityManager = $entityManager = require_once __DIR__ . '/bootstrap.php';

$theBugId = $argv[1];

/** @var Bug $bug */
$bug = $entityManager->find("Bug", (int)$theBugId);

echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
