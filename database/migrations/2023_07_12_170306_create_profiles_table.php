<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name_profile')->unique();
            $table->timestamps();
        });

        // Agregar los perfiles
        $profiles = [
            'Resident',
            'Leasing agent',
            'Property manager',
            'Parking inspector',
            'Dispatcher',
            'Manager dispatcher',
            'Company administrator',
            'Dispatcher'
        ];

        foreach ($profiles as $profile) {
            DB::table('profiles')->insert(['name_profile' => $profile]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
