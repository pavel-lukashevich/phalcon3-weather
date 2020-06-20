<?php

namespace App\Controllers;

use Phalcon\DI\Injectable;

abstract class ApiController extends Injectable
{
    public function responseJson(array $data, int $code = 200)
    {
        $this->response->setStatusCode($code)
            ->setJsonContent($data)
            ->send();
        die;
    }
}