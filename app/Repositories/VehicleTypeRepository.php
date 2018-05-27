<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 12:13 PM
 */

namespace App\Repositories;

use App\Contracts\IVehicleTypeRepository;
use App\Models\VehicleType;

class VehicleTypeRepository implements IVehicleTypeRepository
{

    public function getVehicleTypeDropDown()
    {
        $vt = VehicleType::pluck('name', 'id')->toArray();
        return ['' => '-SELECT-'] + $vt;
    }

}
