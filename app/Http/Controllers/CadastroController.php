<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;
use App\Http\Controllers\HistoricoController;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $solicitacao = new Visitante();
        $solicitacao->placa = $request->input('placa');
        $solicitacao->nome = $request->input('nome');
        $solicitacao->mat_equip = $request->input('mat_equip');

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
            'placa' => 'required|max:7|regex:/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/',
            'nome' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/',
            'mat_equip' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ, ]+$/',
            
        ],
    [
        'placa.required'=>'O campo Placa é obrigatório',
        'nome.required'=>'O campo Nome do motorista é obrigatório',
        'mat_equip.required'=>'O campo Materiais | Equipamentos é obrigatório'
    ]);

        Visitante::create($request->all());

        return redirect()->route('visitante')->with('msg','Criado com sucesso!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $solicitacao = Visitante::orderby('id', 'DESC')->paginate(10);

        return view('historico2', ['solicitacao' => $solicitacao]);
    }

    public function show2(Request $request)
    {
       

        return view('cadastro1');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitacao = Visitante::findOrFail($id);

        return view('historico2', ['solicitacao' => $solicitacao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $solicitacao)
    {
        /*$solicitacao = Visitante::findOrFail($solicitacao);
        
        $solicitacao-> update([
            'id_visitante' => $request -> id_visitante,
            'mat_equip2' => $request -> mat_equip2,
        ]);
        $solicitacao->save();*/

        $solicitacao = Visitante::findOrFail($request->id);
        $solicitacao->mat_equip2 = $request->input('mat_equip2');
        $solicitacao->ativo = 0;
        $solicitacao->update();

        return redirect()->route('visitante')->with('msg','Salvo com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitante $visitante)
    {
        //
    }
}
