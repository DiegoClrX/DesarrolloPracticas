<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            //Id incrementado es recomendable que se llame id
            $table->increments('id');
            //El numero despues de la coma indica el tamaño del String
            $table->string('nombre', 50);
            $table->string('apellidos', 80);
            $table->string('dni', 10);
            $table->string('direccion', 100);
            $table->string('ciudad', 40);
            $table->string('cargo', 40);
            $table->boolean('erte');

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
        Schema::dropIfExists('empleados');
    }
}
