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
        Schema::create('permit_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('resident')->default(0);
            $table->boolean('visitor')->default(0);
            $table->boolean('sub_contractor')->default(0);
            $table->boolean('carport')->default(0);
            $table->boolean('temporary')->default(0);
            $table->boolean('reserved')->default(0);
            $table->boolean('vip')->default(0);
            $table->boolean('contractor')->default(0);
            $table->boolean('employee')->default(0);
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
        Schema::dropIfExists('permit_settings');
    }
};
