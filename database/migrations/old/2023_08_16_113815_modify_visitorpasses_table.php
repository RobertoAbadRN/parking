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
        Schema::table('visitorpasses', function (Blueprint $table) {
            // Eliminamos las columnas que no son necesarias
            $table->dropColumn(['resident_name', 'resident_phone', 'unit_number']);

            // Agregamos la columna user_id como llave foránea
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            // Si deseas agregar más cambios en el esquema, hazlo aquí

            // Ajustamos otros campos si es necesario

            // ...
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitorpasses', function (Blueprint $table) {
            // Revertimos los cambios en caso de hacer rollback
            $table->string('visitor_name');
            $table->string('visitor_phone');

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Si deseas revertir más cambios, hazlo aquí

            // ...
        });
    }
};

