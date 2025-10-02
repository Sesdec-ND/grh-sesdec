<?php


use App\Http\Controllers\Api\ServidorController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

// Auth Sanctum (ex: rota de login simples)
Route::post('/login', function(Request $r){
    $user = \App\Models\User::where('email', $r->email)->first();
    if (!$user || !Hash::check($r->password, $user->password)) {
        return response()->json(['message'=>'Credenciais inválidas'], 401);
    }
    return ['token' => $user->createToken('api')->plainTextToken];
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('servidores', ServidorController::class);
    // depois: Route::apiResource('lotacoes', ...); etc.
});