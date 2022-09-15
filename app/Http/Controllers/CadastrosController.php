<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use App\Http\Controllers\HistoricoController;


class CadastrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $solicitacao = new Cadastro();
        $solicitacao->placa = $request->input('placa');
        $solicitacao->nome = $request->input('nome');


        $solicitacao->save();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required',
            'mat_equip' => 'required',
        ]);

        Cadastro::create($request->all());

        return redirect()->route('historico');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function show(Cadastro $cadastro)
    {
        $cadastro = Cadastro::get();

        return view('historico', ['cadastro' => $cadastro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cadastro $cadastro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cadastro $cadastro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadastro $cadastro)
    {
        //
    }
}
