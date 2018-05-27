<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 10:36 AM
 */

namespace App\Contracts;

use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

interface IDriverRepository
{
    public function addDriver($driver = []);

    public function getDriver($param, $field = 'id');

    public function getDrivers($param = null, $field = null);

    public function updateDriver($id, $data = []);
}
