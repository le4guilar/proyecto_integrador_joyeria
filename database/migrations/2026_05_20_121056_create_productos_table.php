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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombreJoya', 50);
            $table->string('descripcion', 200);
            $table->float('precioUnitario', 2);
            $table->integer('stock');
            $table->integer('stockBajo');
            $table->string('urlImagen');
            $table->boolean('activo');
            $table->foreignId('categoria_joya_id')->constrained('categoria_joya');
            $table->foreignId('genero_joya_id')->constrained('genero_joya');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
