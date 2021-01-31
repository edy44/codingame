<?php

namespace CodinGame\Easy\Defibrillator;

/**
 * Class Defibrillator
 * @package CodinGame\Defibrillator
 */
class Defibrillator
{
    /**
     * @var float
     */
    private float $lon;
    /**
     * @var float
     */
    private float $lat;
    /**
     * @var array
     */
    private array $defibs;

    /**
     * Defibrillator constructor.
     * @param string $defibs
     */
    public function __construct(string $defibs)
    {
        $this->defibs = $this->formatDefibsList($defibs);
    }

    /**
     * @param string $lon
     * @param string $lat
     * @return string
     */
    public function findClosest(string $lon, string $lat): string
    {
        $this->lon = $this->convertToRadian($lon);
        $this->lat = $this->convertToRadian($lat);

        $results = $this->calculateDistanceFromEachPlace();
        $id = array_key_first($results);

        return $this->defibs[$id]['name'];
    }

    /**
     * @param string $value
     * @return float
     */
    private function convertToRadian(string $value): float
    {
        $value = str_replace(',', '.', $value);
        $degree = floatval($value);

        return ($degree * pi()) / 180;
    }

    /**
     * @param string $list
     * @return array
     */
    private function formatDefibsList(string $list): array
    {
        $defibs = [];
        $data = explode('%', $list);

        foreach ($data as $array) {
            $array = explode(';', $array);
            $id = $array[0];
            $name = $array[1];
            $lon = $array[4];
            $lat = $array[5];

            $defibs[$id]['name'] = $name;
            $defibs[$id]['lon'] = $lon;
            $defibs[$id]['lat'] = $lat;
        }

        return $defibs;
    }

    /**
     * @return array
     */
    private function calculateDistanceFromEachPlace(): array
    {
        $results = [];
        foreach ($this->defibs as $id => $defib) {
            $lon = $this->convertToRadian($defib['lon']);
            $lat = $this->convertToRadian($defib['lat']);
            $x = $this->calculateX($this->lon, $lon, $this->lat, $lat);
            $y = $this->calculateY($this->lat, $lat);
            $distance = $this->calculateDistance($x, $y);

            $results[$id] = $distance;
        }

        asort($results, SORT_NUMERIC);

        return $results;
    }

    /**
     * @param float $lon2
     * @param float $lon1
     * @param float $lat2
     * @param float $lat1
     * @return float
     */
    private function calculateX(float $lon2, float $lon1, float $lat2, float $lat1): float
    {
        return ($lon2 - $lon1) * cos(($lat2 + $lat1) / 2);
    }

    /**
     * @param float $lat2
     * @param float $lat1
     * @return float
     */
    private function calculateY(float $lat2, float $lat1): float
    {
        return $lat2 - $lat1;
    }

    /**
     * @param float $x
     * @param float $y
     * @return float
     */
    private function calculateDistance(float $x, float $y): float
    {
        return sqrt(pow($x, 2) + pow($y, 2));
    }
}
