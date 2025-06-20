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
        Schema::create('auditorios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('direccion', 200);
            $table->integer('capacidad');
            $table->string('foto', 300)->nullable();
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auditorios', function (Blueprint $table) {
            $table->dropColumn(['ciudad', 'telefono', 'descripcion']);
        });
    }
};
