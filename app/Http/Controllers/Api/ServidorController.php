<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServidorRequest;
use App\Http\Requests\UpdateServidorRequest;
use App\Models\Servidor;
use GuzzleHttp\Psr7\Request;

class ServidorController extends Controller
{
    public function index(Request $r)
    {
        return Servidor::query()
            ->with(['lotacaoAtual.lotacao','vinculos'])
            ->when($r->q, fn($q)=>$q->where('nome','like',"%{$r->q}%")->orWhere('cpf','like',"%{$r->q}%"))
            ->paginate(15);
    }

    public function store(StoreServidorRequest $req)
    {
        $servidor = Servidor::create($req->validated());
        return response()->json($servidor, 201);
    }

    public function show(Servidor $servidor)
    {
        return $servidor->load(['lotacoes.lotacao','vinculos']);
    }

    public function update(UpdateServidorRequest $req, Servidor $servidor)
    {
        $servidor->update($req->validated());
        return response()->json($servidor);
    }

    public function destroy(Servidor $servidor)
    {
        $servidor->delete();
        return response()->noContent();
    }
}
