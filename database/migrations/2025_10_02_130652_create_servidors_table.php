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
    Schema::create('servidors', function (Blueprint $t) {
        $t->id();
        $t->string('cpf')->unique();
        $t->string('rg')->nullable();
        $t->date('data_nascimento')->nullable();
        $t->string('nome');
        $t->string('nome_pai')->nullable();
        $t->string('nome_mae')->nullable();
        $t->enum('genero', ['MASCULINO','FEMININO','NAO_INFORMADO'])->default('NAO_INFORMADO');
        $t->string('formacao')->nullable();
        $t->enum('raca_cor', ['BRANCA','PRETA','PARDA','AMARELA','INDIGENA','NAO_INFORMADO'])->default('NAO_INFORMADO');
        $t->enum('tipo_sanguineo', ['A+','A-','B+','B-','AB+','AB-','O+','O-'])->nullable();
        $t->string('pis_pasep')->nullable();
        $t->timestamps();
        $t->softDeletes();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servidors');
    }
};
