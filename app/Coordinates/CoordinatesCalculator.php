<?php 
namespace App\Coordinates;
class CoordinatesCalculator implements Coordinates 
	{
		private $lat;
		private $lon;

		public function __construct($lat,$lon)
		{
			$this->lat = $lat;
			$this->lon = $lon;
		}
		
		public function distanceCalculator($lat,$lon)
			{
				return 2 * asin(sqrt(pow(sin(($this->lat - $lat) / 2), 2) + cos($this->lat) * cos($lat) * pow(sin(($this->lon - $lon) / 2), 2)));
			}
	}