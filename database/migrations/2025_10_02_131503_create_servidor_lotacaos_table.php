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
        Schema::create('servidor_lotacaos', function (Blueprint $t) {
            $t->id();
            $t->foreignId('servidor_id')->constrained('servidors')->cascadeOnDelete();
            $t->foreignId('lotacao_id')->constrained('lotacaos')->cascadeOnDelete();
            $t->date('inicio');
            $t->date('fim')->nullable();
            $t->boolean('atual')->default(false);
            $t->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servidor_lotacaos');
    }
};
