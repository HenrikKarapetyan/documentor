<?php

use Henrik\Documentor\Documentor;

require 'vendor/autoload.php';

$documentor = new Documentor();
$documentor->setOutputDirectory(__DIR__ . '/../docs');
$documentor->setNamespace('\\Henrik\\Documentor');
$documentor->makeDocumentation();