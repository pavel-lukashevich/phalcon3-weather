<?php

$location = new \Phalcon\Mvc\Micro\Collection();
$location->setHandler(App\Controllers\LocationController::class, true);
$location->setPrefix('');
$location->get('/locations', 'indexAction');
$location->get('/locations/redis', 'indexByRedisAction');
$location->post('/locations', 'locationAction');
$application->mount($location);


// not found URLs
$application->notFound(
  function () use ($application) {
      $application->response->setStatusCode(404)
          ->setJsonContent(['error' => 'Page not found'])
          ->send();
      die;
  }
);
