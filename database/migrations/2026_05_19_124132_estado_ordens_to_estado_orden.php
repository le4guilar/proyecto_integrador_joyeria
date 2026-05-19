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
        Schema::rename('estado_ordens', 'estado_orden');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('estado_orden', 'estado_ordens');
    }
};
