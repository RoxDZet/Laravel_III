<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *Publicaciones: id, usuario_id, titulo(50), publicacion(250), fecha(date)
     *
     * Ninguna de las tablas tendrá los campos created_at y updated_at. 
     * La tabla usuarios tendrá el campo deleted_at y usará el soft delete.  
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('titulo', 50);
            $table->string('publicacion', 250);
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacions');
    }
};
