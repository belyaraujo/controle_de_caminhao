<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use App\Models\Placa;
use Illuminate\Http\Request;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\CadastroController;


class CadastradosController extends Controller
{
    public function placa(Request $request){

        $placa = Placa::orderby('id')->get();

        return view('Cadastro', compact('placa'));

    }
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
        $cadastro = new Cadastro();
        $cadastro->placa = $request->input('id_placa');
        $cadastro->mat_equip = $request->input('mat_equip');


        $cadastro->save();


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
            'id_placa' => 'required',
            'mat_equip' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ,.?! ]+$/',
        ],
    [
        'id_placa.integer'=> 'Campo Placas é obrigatório',
        'mat_equip.required'=>'Campo Material | equipamento é obrigatório',
        
    ]);

        Cadastro::create($request->all());

        return redirect()->route('historico')->with('msg','Criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cadastro = Cadastro::orderby('order', 'DESC');;

        return view('Cadastro', ['cadastro' => $cadastro]);
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
