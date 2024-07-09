<?php

require 'vendor/autoload.php';

use Henrik\DI\DependencyInjector;
use Henrik\Documentor\DocumentorInterface;

$services = require 'configs/services.php';
$di = DependencyInjector::instance();
$di->load($services);

/** @var DocumentorInterface $documentor */
$documentor = $di->get(DocumentorInterface::class);
$documentor->makeDocumentation();