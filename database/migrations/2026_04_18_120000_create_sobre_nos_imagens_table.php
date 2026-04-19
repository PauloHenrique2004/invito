<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSobreNosImagensTable extends Migration
{
    public function up(): void
    {
        Schema::create('sobre_nos_imagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sobre_nos_id')->constrained('sobre_nos')->cascadeOnDelete();
            $table->string('imagem');
            $table->unsignedInteger('ordem')->default(1);
            $table->timestamps();
        });

        $registros = DB::table('sobre_nos')
            ->select('id', 'imagem')
            ->whereNotNull('imagem')
            ->where('imagem', '!=', '')
            ->get();

        foreach ($registros as $registro) {
            $jaExiste = DB::table('sobre_nos_imagens')
                ->where('sobre_nos_id', $registro->id)
                ->where('imagem', $registro->imagem)
                ->exists();

            if (!$jaExiste) {
                DB::table('sobre_nos_imagens')->insert([
                    'sobre_nos_id' => $registro->id,
                    'imagem' => $registro->imagem,
                    'ordem' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('sobre_nos_imagens');
    }
}
