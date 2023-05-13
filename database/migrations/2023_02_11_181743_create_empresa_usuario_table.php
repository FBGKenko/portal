<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_usuario', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained();
            $table->foreignId('empresa_id')->constrained();
            $table->boolean('datosPersonales')->default(false);
            $table->boolean('datosFiscales')->default(false);
            $table->boolean('datosDomicilio')->default(false);
            $table->boolean('datosBancarios')->default(false);
            $table->timestamps();
            $table->index('usuario_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimientos');
    }
};
