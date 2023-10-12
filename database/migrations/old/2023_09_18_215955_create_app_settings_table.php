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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('property_code')->unique();
            $table->integer('vehicles_per_apartment')->nullable();
            $table->enum('tenants_change_info', ['YES', 'NO'])->nullable();
            $table->enum('notify_on_tenants_info', ['YES', 'NO'])->nullable();
            $table->integer('maximum_of_changes_allowed')->nullable();
            $table->enum('reserved_spot_allow', ['YES', 'NO'])->nullable();
            $table->integer('reserved_spot_per_apartment')->nullable();
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
        Schema::dropIfExists('app_settings');
    }
};
