<?php

$entityManager = require_once __DIR__ . '/bootstrap.php';

$bugId = $argv[1];

/** @var Bug $bug */
$bug = $entityManager->find('Bug', $bugId);
$bug->close();

$entityManager->flush();
