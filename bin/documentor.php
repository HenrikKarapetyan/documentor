<?php

use Henrik\Documentor\Documentor;

require 'vendor/autoload.php';
$configs = require '.documentor-config.php';
$documentor = new Documentor();
$documentor->setOutputDirectory($configs['outputDirectory']);
$documentor->setNamespace($configs['namespace']);
$documentor->makeDocumentation();