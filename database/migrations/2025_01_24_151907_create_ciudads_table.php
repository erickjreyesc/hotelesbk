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
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id()->comment('Llave primaria de la tabla');
            $table->unsignedBigInteger('departamento_id')->nullable()->comment('Llave foránea de la tabla departamentos.');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->string('nombre', 255)->comment('nombre de la ciudad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudades');
    }
};
