<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id()->comment('Llave primaria de la tabla');
            $table->unsignedBigInteger('ciudad_id')->nullable()->comment('Llave foránea de la tabla ciudades.');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->string('nombre', 200)->comment('Nombre de la hotel');
            $table->string('nit', 20)->nullable()->default('numero de identificación tributaria');
            $table->string('direccion', 200)->nullable()->comment('Direccion del hotel');
            $table->integer('totalhab')->unsigned()->default(0)->comment('Cantidad de habitaciones del hotel');
            $table->boolean('estado')->nullable()->default(false)->comment('Estado del objeto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoteles');
    }
};
