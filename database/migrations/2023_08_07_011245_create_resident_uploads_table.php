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
        Schema::create('resident_uploads', function (Blueprint $table) {
            $table->id();
            $table->string("file_name", 120);
            $table->string("file_name_original", 120);
            $table->string("file_extension", 12);
            $table->string("file_path", 120);
            $table->string("full_path", 220);
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
        Schema::dropIfExists('resident_uploads');
    }
};
