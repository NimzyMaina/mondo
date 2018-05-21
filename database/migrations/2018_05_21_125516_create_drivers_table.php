<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('vehicle_type_id');
            $table->string('driver_id');
            $table->string('vehicle_owner')->nullable();
            $table->boolean('active');
            $table->boolean('smartphone');
            $table->boolean('pictures');
            $table->boolean('registration_fees');
            $table->boolean('online');
            $table->boolean('inspected');
            $table->boolean('banned');
            $table->string('phone_number');
            $table->integer('call_provider_id');
            $table->integer('isp_provider_id');
            $table->string('phone_model');
            $table->integer('zone_id');
            $table->string('area');
            $table->string('station');
            $table->integer('hour_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
