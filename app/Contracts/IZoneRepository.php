<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 11:39 AM
 */

namespace App\Contracts;

use App\Models\Zone;

interface IZoneRepository
{

    public function getZoneDropDown();
}
