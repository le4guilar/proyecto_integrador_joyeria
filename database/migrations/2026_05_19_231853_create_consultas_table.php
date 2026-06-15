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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();

            // Campos obligatorios para saber quién escribe
            $table->string('nombre', 100);
            $table->string('email', 100);
            $table->integer('telefono');

            // Los campos de tu consulta original
            $table->string('mensaje', 200);
            $table->boolean('estado')->default(true);

            // Clave foránea opcional (permite nulos)
            $table->foreignId('usuario_id')->nullable()->constrained('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta');
    }
};
