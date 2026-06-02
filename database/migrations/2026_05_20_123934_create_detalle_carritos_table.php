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
        Schema::create('detalle_carrito', function (Blueprint $table) {
            $table->primary(['id', 'carrito_id']);
            $table->id();
            $table->foreignId('carrito_id')->constrained('carrito');
            $table->integer('cantidad');
            $table->foreignId('producto_id')->constrained('producto');
            $table->timestamps();   
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_carrito');
    }
};
