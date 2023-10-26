<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultEmailsRegisterVehicleTable extends Migration
{
    public function up()
    {
        Schema::create('default_emails_register_vehicle', function (Blueprint $table) {
            $table->id();
            $table->text('email_content')->nullable();
            $table->string('property_code')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('default_emails_register_vehicle');
    }
}
