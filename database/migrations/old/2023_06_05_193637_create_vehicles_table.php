<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('property_code');
            $table->string('resident_name');
            $table->string('email');
            $table->string('phone');
            $table->string('apart_unit');
            $table->string('preferred_language');
            $table->string('license_plate');
            $table->string('vin');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('color');
            $table->string('vehicle_type');
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
        Schema::dropIfExists('vehicles');
    }
};
