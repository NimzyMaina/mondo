<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 11:37 AM
 */

namespace App\Contracts;

use App\Models\VehicleType;

interface IVehicleTypeRepository
{

    public function getVehicleTypeDropDown();
}
