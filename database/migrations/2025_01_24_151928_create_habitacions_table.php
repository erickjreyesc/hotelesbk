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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id()->comment('Llave primaria de la tabla');
            $table->string('nombre', 100)->comment('Nombre de la habitación');
            $table->text('descripcion')->nullable()->default('Descripción de la habitacion');
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
        Schema::dropIfExists('habitaciones');
    }
};
