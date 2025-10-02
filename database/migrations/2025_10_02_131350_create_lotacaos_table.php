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
        Schema::create('lotacaos', function (Blueprint $t) {
            $t->id();
            $t->string('nome');
            $t->string('sigla')->nullable();
            $t->foreignId('corporacao_id')->constrained('corporacaos')->cascadeOnDelete();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotacaos');
    }
};
