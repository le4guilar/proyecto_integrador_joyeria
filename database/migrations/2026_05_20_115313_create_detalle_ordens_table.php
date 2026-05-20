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
        Schema::create('detalle_orden', function (Blueprint $table) {
            $table->primary(['id', 'orden_Id']);
            $table->id();
            $table->foreignId('orden_Id')->constrained('orden');
            $table->integer('cantidad');
            $table->float('subtotal', 2);
            $table->float('precioUnitario', 2);
            $table->foreignId('producto_id')->constrained('producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_orden');
    }
};
