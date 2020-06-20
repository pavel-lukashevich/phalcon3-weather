<?php

require_once './../vendor/autoload.php';

$config = require(__DIR__ . '/../app/config/config.php');

/** @var \Phalcon\DI\FactoryDefault $di */
$di = require __DIR__ . '/../app/config/di.php';

$application = new \Phalcon\Mvc\Micro();

$application->setDI($di);

require __DIR__ . '/../app/config/routes.php';

$application->handle();
