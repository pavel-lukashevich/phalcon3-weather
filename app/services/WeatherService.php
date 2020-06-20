<?php

namespace App\Services;

class WeatherService extends \Phalcon\DI\Injectable
{
    /**
     * @param string $query
     * @return array|bool
     */
	public function getWeather(string $query)
    {
        $parts = explode(',', $query);
        if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
            $query = 'lat=' . trim($parts[0]) . '&lon=' . trim($parts[1]);
        } elseif (count($parts) <= 3 && !preg_match("/[\d]+/", $query)) {
            $query = 'q=' . $query;
        }

        if (isset($query)) {
            $result = $this->getResult($query);
            if (!empty($result)) {
                return json_decode($result);
            }
        }

        return false;
    }

    /**
     * @param string $query
     * @return false|string
     */
	private function getResult(string $query)
    {
        $link = $this->config->weather->url . '?' . $query . '&APPID=' . $this->config->weather->appId;

        return @file_get_contents($link);
    }
}
