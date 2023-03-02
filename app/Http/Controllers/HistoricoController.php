<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use App\Http\Controllers\VisitantesController;



class HistoricoController extends Controller
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
        $cadastro = new Cadastro();
        $cadastro->id_placa = $request->input('id_placa');
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
            'mat_equip' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/',
            'mat_equip2' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ,.?! ]+$/',
        ]);

        Cadastro::create($request->all());

        return redirect()->route('historico');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cadastro = Cadastro::orderby('id', 'DESC')->paginate(10);
        //$data = Cadastro::find('id')->with(['cadastro'])->get();

        return view('historico', ['cadastro' => $cadastro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cadastro = Cadastro::findOrFail($id);
       

        return view('historico', ['cadastro' => $cadastro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //$cadastro = Cadastro::findOrFail($id);
        //$cadastro->mat_equip2 = $request->input('mat_equip2');
        //$cadastro->save();

        //$cadastro = Cadastro::findOrFail($id);
       
        
          //$cadastro-> update([
          //'id_caminhao' => $request -> id_caminhao,
            //'mat_equip2' => $request -> mat_equip2,
        //]);


        //$cadastro->mat_equip2 = $request->input('mat_equip2');


        //$cadastro->save();

        $cadastro = Cadastro::find($request->id);
        $cadastro->mat_equip2 = $request->input('mat_equip2');
        $cadastro->ativo = 0;
        $cadastro->update();

        return redirect()->route('historico')->with('msg','Salvo com sucesso!');
        //return view('historico', ['cadastro' => $cadastro]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $visitante)
    {
        //
    }
}
