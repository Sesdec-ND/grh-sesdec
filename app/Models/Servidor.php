<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servidor extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cpf',
        'rg',
        'data_nascimento',
        'nome',
        'nome_pai',
        'nome_mae',
        'genero',
        'formacao',
        'raca_cor',
        'tipo_sanguineo',
        'pis_pasep'
    ];

    public function lotacoes()
    {
        return $this->hasMany(ServidorLotacao::class);
    }
    public function vinculos()
    {
        return $this->hasMany(ServidorVinculo::class);
    }
    public function lotacaoAtual()
    {
        return $this->hasOne(ServidorLotacao::class)->where('atual', true);
    }
    /** @use HasFactory<\Database\Factories\ServidorFactory> */
    use HasFactory;
}
