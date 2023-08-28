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
            $table->string('property_code')->nullable();
            $table->string('visitor_name')->nullable();
            $table->string('visitor_phone')->nullable();
            $table->string('license_plate')->nullable();
            $table->integer('year')->nullable();
            $table->string('make')->nullable();
            $table->string('color')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('resident_name')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('resident_phone')->nullable();
            $table->dateTime('valid_from')->nullable();
            $table->string('model')->nullable();
            $table->string('status')->nullable();
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
