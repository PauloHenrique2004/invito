<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSobreNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up(): void
{
    Schema::create('sobre_nos', function (Blueprint $table) {
        $table->id();
        // Sessão Principal
        $table->string('titulo');
        $table->text('descricao'); 
        $table->string('imagem')->nullable(); // Foto quadrada
        
        // Pilares
        $table->text('missao');
        $table->text('visao');
        $table->text('valores');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sobre_nos');
    }
}
