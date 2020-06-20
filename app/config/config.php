<?php

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'PdoMysql',
        'host'        => '127.0.0.1',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'phalcon',
        'charset'     => 'utf8',
    ],
    'redis' => [
        'host'        => '127.0.0.1',
        'port'        => '6379',
    ],
    'application' => [
        'controllersDir' => 'app/controllers/',
        'modelsDir'      => 'app/models/',
        'baseUri'       => '/'
    ],
    'weather' => [
        'url'      => 'http://api.openweathermap.org/data/2.5/weather',
        'appId' => 'a782cbe917e309c6e5734656d90ea804',
    ]
]);