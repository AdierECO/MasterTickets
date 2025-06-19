<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('eventos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion');
        $table->dateTime('fecha_hora');
        $table->foreignId('auditorio_id')->constrained();
        $table->foreignId('categoria_id')->constrained();
        $table->string('imagen')->nullable();
        $table->decimal('precio', 10, 2);
        $table->integer('capacidad');
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
