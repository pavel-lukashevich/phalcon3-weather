<?php

namespace App\Controllers;

class LocationController extends ApiController
{
    public function indexAction()
    {
        $this->responseJson($this->citiesService->getList());
    }

    public function indexByRedisAction()
    {
        $this->responseJson($this->redis->smembers('cities'));
    }

    public function locationAction()
    {
        $locations = $this->request->get('locations');
        $weather = $this->weatherService->getWeather($locations);
        if ($weather == false) {
            $this->responseJson(['error' => 'Invalid data'], 400);
        }

        $city = implode(',', [$weather->name, $weather->sys->country]);
        $this->citiesService->create($city);
        $this->redis->sadd('cities', $city);

        $this->responseJson(['weather' => $weather]);
    }
}