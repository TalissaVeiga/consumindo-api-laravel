<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function buscar($cep)
    {
        $resposta = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        $dados = $resposta->json();

        $endereco = Endereco::updateOrCreate(
        ['cep' => $dados['cep']],
        [
            'logradouro' => $dados['logradouro'],
            'bairro' => $dados['bairro'],
            'localidade' => $dados['localidade'],
            'uf' => $dados['uf'],
        ]
    );


        return response()->json($endereco);
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
