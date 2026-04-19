<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeloToSobreNosTable extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('sobre_nos', 'selo')) {
            Schema::table('sobre_nos', function (Blueprint $table) {
                $table->string('selo', 60)->nullable()->after('valores');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('sobre_nos', 'selo')) {
            Schema::table('sobre_nos', function (Blueprint $table) {
                $table->dropColumn('selo');
            });
        }
    }
}
