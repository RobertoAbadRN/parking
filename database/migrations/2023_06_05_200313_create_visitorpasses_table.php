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
        Schema::create('visitorpasses', function (Blueprint $table) {
            $table->id();
            $table->string('property_code');
            $table->string('visitor_name');
            $table->string('visitor_phone');
            $table->string('license_plate');
            $table->integer('year');
            $table->string('make');
            $table->string('color');
            $table->string('vehicle_type');
            $table->string('resident_name');
            $table->string('unit_number');
            $table->string('resident_phone');
            $table->dateTime('valid_from');
            $table->string('model');
            $table->string('status');
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
        Schema::dropIfExists('visitorpasses');
    }
};
