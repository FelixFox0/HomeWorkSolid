<?php

namespace App\Services;

/**
 * Class Coordinates.
 */
class CoordinatesService
{
		private $lat;
		private $lon;

		public function set_coordinates($lat,$lon)
			{
				$this->lat = $lat;
				$this->lon = $lon;
				return $this;
			}
		public function distanceCalculator($lat,$lon)
			{
				return 2 * asin(sqrt(pow(sin(($this->lat - $lat) / 2), 2) + cos($this->lat) * cos($lat) * pow(sin(($this->lon - $lon) / 2), 2)));
			}
}
