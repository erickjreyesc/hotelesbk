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
        Schema::create('categoria_habitacion', function (Blueprint $table) {
            $table->id()->comment('Llave primaria de la tabla');
            $table->unsignedBigInteger('habitacion_id')->nullable()->comment('Llave foránea de la tabla habitaciones.');
            $table->foreign('habitacion_id')->references('id')->on('habitaciones');
            $table->unsignedBigInteger('acomodacion_id')->nullable()->comment('Llave foránea de la tabla acomodaciones.');
            $table->foreign('acomodacion_id')->references('id')->on('acomodaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_habitacion');
    }
};
