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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreJoya', 20);
            $table->float('precioUnit', 2);
            $table->string('descripcion', 200);
            $table->int('stock');
            $table->int('stockBajo');
            $table->string('urlImagen', 200);
            $table->boolean('activo');
            $table->foreignId('id_categoriaJoya')->constrained();
            $table->foreignId('id_generoJoya')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
