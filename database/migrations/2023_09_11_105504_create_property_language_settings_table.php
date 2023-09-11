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
        Schema::create('property_language_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('camp_es_1')->nullable();
            $table->longText('camp_es_2')->nullable();
            $table->longText('camp_es_3')->nullable();
            $table->longText('camp_es_4')->nullable();
            $table->longText('camp_es_5')->nullable();
            $table->longText('camp_es_6')->nullable();
            $table->longText('camp_es_7')->nullable();
            $table->longText('camp_es_8')->nullable();
            $table->longText('camp_es_9')->nullable();
            $table->longText('camp_es_10')->nullable();
            $table->longText('camp_es_11')->nullable();
            $table->longText('camp_es_12')->nullable();
            $table->longText('camp_en_1')->nullable();
            $table->longText('camp_en_2')->nullable();
            $table->longText('camp_en_3')->nullable();
            $table->longText('camp_en_4')->nullable();
            $table->longText('camp_en_5')->nullable();
            $table->longText('camp_en_6')->nullable();
            $table->longText('camp_en_7')->nullable();
            $table->longText('camp_en_8')->nullable();
            $table->longText('camp_en_9')->nullable();
            $table->longText('camp_en_10')->nullable();
            $table->longText('camp_en_11')->nullable();
            $table->longText('camp_en_12')->nullable();
            $table->longText('camp_fr_1')->nullable();
            $table->longText('camp_fr_2')->nullable();
            $table->longText('camp_fr_3')->nullable();
            $table->longText('camp_fr_4')->nullable();
            $table->longText('camp_fr_5')->nullable();
            $table->longText('camp_fr_6')->nullable();
            $table->longText('camp_fr_7')->nullable();
            $table->longText('camp_fr_8')->nullable();
            $table->longText('camp_fr_9')->nullable();
            $table->longText('camp_fr_10')->nullable();
            $table->longText('camp_fr_11')->nullable();
            $table->longText('camp_fr_12')->nullable();
            $table->boolean('name')->nullable();
            $table->boolean('type')->nullable();
            $table->boolean('space')->nullable();
            $table->boolean('license')->nullable();
            $table->boolean('number')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('logo')->nullable();
            $table->string('ppm')->nullable();
            $table->string('img')->nullable();
            $table->longText('margin_left')->nullable();
            $table->longText('margin_top')->nullable();
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
        Schema::dropIfExists('property_language_settings');
    }
};
