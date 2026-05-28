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
            $table->string('asunto' , 50);
            $table->string('mensaje' , 200);
            $table->boolean('estado')->default(true);
            $table->foreignId('usuario_id')->constrained('users');
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
