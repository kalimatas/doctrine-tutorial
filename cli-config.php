<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityManager = require_once __DIR__ . '/bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);
