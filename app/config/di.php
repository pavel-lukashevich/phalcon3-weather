<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Http\Response;
use Phalcon\Db\Adapter\Pdo\PdoMysql;

// Initializing a DI Container
$di = new FactoryDefault();

// Overriding Response-object to set the Content-type header globally
$di->setShared(
    'response',
    function () {
        $response = new Response();
        $response->setContentType('application/json', 'utf-8');

        return $response;
    }
);

$di->setShared('config', $config);

$di->set(
    "db_mysql",
    function () use ($config) {
        return new PdoMysql([
          "host"     => $config->database->host,
          "username" => $config->database->username,
          "password" => $config->database->password,
          "dbname"   => $config->database->dbname
        ]);
    }
);

$di->setShared('redis', function() use(&$config) {
    $redis = new \Redis;
    $redis->connect($config->redis->host, $config->redis->port);

    return $redis;
});

// Add Services
$di->setShared('weatherService', '\App\Services\WeatherService');
$di->setShared('citiesService', '\App\Services\CitiesService');

return $di;