<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name','vehicle_type_id','driver_id','vehicle_owner','active','smartphone','documents',
        'trained','registration_fees','online','inspected','banned','phone_number','call_provider_id',
        'isp_provider_id','phone_model','zone_id','area','station','hour_id'];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id', 'id');
    }

    public function callProvider()
    {
        return $this->belongsTo(Provider::class, 'call_provider_id', 'id');
    }

    public function ispProvider()
    {
        return $this->belongsTo(Provider::class, 'isp_provider_id', 'id');
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id', 'id');
    }

    public function hours()
    {
        return $this->belongsTo(Hour::class, 'hour_id', 'id');
    }

    public function references()
    {
        return $this->hasMany(Reference::class, 'driver_id', 'id');
    }
}
