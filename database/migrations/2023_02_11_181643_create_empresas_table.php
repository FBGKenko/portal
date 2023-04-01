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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("usuario_id")->nullable()->constrained();
            $table->string('razonSocial',70)->unique();
            $table->string('correoEmpresa', 100);
            $table->string('telefonoEmpresa',20);
            $table->string('paginaWeb',140)->nullable();                                        
            $table->timestamps();
            $table->index("razonSocial");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
