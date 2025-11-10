<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->date('fecha')->nullable();               // Campo fecha opcional
            $table->string('estado')->default('activo');      // Campo estado con valor por defecto
            $table->integer('prioridad')->default(1);         // Campo prioridad con valor por defecto
        });
    }

    public function down(): void
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropColumn(['fecha', 'estado', 'prioridad']);
        });
    }
};
