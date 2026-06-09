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
        Schema::create('carrito', function (Blueprint $table) {
            // 1. Clave primaria normal y auto-incremental
            $table->id();

            // 2. Relaciones con las otras tablas (Claves Foráneas)
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('producto')->onDelete('cascade');

            // 3. Datos propios del carrito 
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2); 

            // 4. Tiempos del sistema
            $table->timestamps();   
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};