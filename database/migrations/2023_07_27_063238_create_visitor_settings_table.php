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
        Schema::dropIfExists('visitor_settings');
        Schema::create('visitor_settings', function (Blueprint $table) {
            $table->id();
            $table->string('field')->nullable();
            $table->boolean('required')->nullable();
            $table->boolean('validation')->nullable();
            $table->boolean('active')->nullable();
            $table->string('name')->nullable();
            $table->string('valor')->nullable();
            $table->string('type')->nullable()->default('form');
            $table->bigInteger('property_id')->nullable();
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
        Schema::dropIfExists('visitor_settings');
    }
};
