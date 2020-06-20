<?php

namespace App\Services;

use App\Models\Cities;

class CitiesService extends \Phalcon\DI\Injectable
{
    /**
     * @param string $city
     * @return bool
     */
	public function create(string $city)
	{
        try {
            $model = new Cities();
            $result = $model->setName($city)->create();
            return $result;
        } catch (\Exception $e) {
			return false;
		}
	}

    /**
     * @return array
     */
    public function getList()
	{
		try {
            $models = Cities::find(['columns' => "name", 'order' => 'name']);

			return $models->toArray();
		} catch (\Exception $e) {
            return ['error' => $e->getMessage()];
		}
	}
}
