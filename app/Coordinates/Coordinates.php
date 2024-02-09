<?php 
namespace App\Coordinates;
interface Coordinates 
{
	public function distanceCalculator($lat,$lon);
}