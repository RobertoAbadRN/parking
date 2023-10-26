<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('emails_aproved', function (Blueprint $table) {
            $table->id();
            $table->text('email_content')->nullable();
            $table->string('property_code')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emails_aproved');
    }
};
