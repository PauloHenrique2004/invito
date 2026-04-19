<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSobreNosIntegrantesTable extends Migration
{
    public function up(): void
    {
        Schema::create('sobre_nos_integrantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sobre_nos_id')->constrained('sobre_nos')->cascadeOnDelete();
            $table->string('foto');
            $table->string('nome');
            $table->string('cargo');
            $table->unsignedInteger('ordem')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sobre_nos_integrantes');
    }
}
