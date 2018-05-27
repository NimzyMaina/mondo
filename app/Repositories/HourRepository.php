<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 1:10 PM
 */

namespace App\Repositories;

use App\Contracts\IHourRepository;
use App\Models\Hour;

class HourRepository implements IHourRepository
{

    public function getHoursDropDown()
    {
        $h = Hour::pluck('name', 'id')->toArray();
        return ['' => '-SELECT-'] + $h;
    }
}
