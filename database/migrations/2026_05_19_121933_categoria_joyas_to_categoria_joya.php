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
        // Renombra de singular a plural
        Schema::rename('categoria_joyas', 'categoria_joya');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revierte el cambio si haces un rollback (de plural a singular)
        Schema::rename('categoria_joya', 'categoria_joyas');
    }
};
