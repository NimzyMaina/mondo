<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 11:40 AM
 */

namespace App\Contracts;

use App\Models\Hour;

interface IHourRepository
{

    public function getHoursDropDown();
}
