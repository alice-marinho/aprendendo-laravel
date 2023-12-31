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
        Schema::table('events', function (Blueprint $table) {
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        # O blueprint é uma classe que fornece uma interface para fazer alterações em tabelas do banco de dados
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
