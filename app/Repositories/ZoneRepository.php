<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 12:46 PM
 */

namespace App\Repositories;

use App\Contracts\IZoneRepository;
use App\Models\Zone;

class ZoneRepository implements IZoneRepository
{

    public function getZoneDropDown()
    {
        $z = Zone::pluck('name', 'id')->toArray();
        return ['' => '-SELECT-'] + $z;
    }
}
