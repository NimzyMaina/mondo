<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = ['name','driver_id','phone_number','contacted','service_quality_id','vehicle_quality_id'];

    public function driver()
    {
        return $this->belongsTo(Driver::class,'driver_id','id');
    }

    public function service_quality()
    {
        return $this->belongsTo(Quality::class,'service_quality_id','id');
    }

    public function vehicle_quality()
    {
        return $this->belongsTo(Quality::class,'vehicle_quality_id','id');
    }


}
