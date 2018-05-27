<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 10:37 AM
 */

namespace App\Repositories;

use App\Contracts\IDriverRepository;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DriverRepository implements IDriverRepository
{
    public function addDriver($driver = [])
    {
        if (empty($driver)) {
            return false;
        }
        return DB::transaction(function () use ($driver) {
            if ($newDriver = Driver::create($driver)) {
                return $newDriver;
            }
            return false;
        });
    }

    public function getDriver($param, $field = 'id')
    {
        return ($field == 'id')? Driver::find($param): Driver::where($field, $param)->first();
    }

    public function getDrivers($param = null, $field = null)
    {
        return (is_null($param) && is_null($field))? Driver::all() : Driver::where($field, $param)->get();
    }

    public function updateDriver($id, $data = [])
    {
        return DB::transaction(function () use ($id, $data) {
            $data['updated_at'] = Carbon::now();
            if (Driver::where('id', $id)->update($data)) {
                return true;
            }
            return false;
        });
    }
}
