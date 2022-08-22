@extends('layouts.main')
@section('title', 'Novacap - Cadastro')
@section('content')
<style>
    input.exampleCheck1 {
        width: 40px;
        height: 40px;
    }
</style>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="mh-100" style="width: 1000px; height: 1000px;">
            <div class="card border-dark" style="max-width: 700rem;">
                <div class="card-header text-white" style="background-color: #044f84;">Controle</div>
                <div class="card-body text-dark">
                    <p class="card-text">


                        {{-- Cadastrar setores --}}

                        <form action="{{ route('cadastrados') }}" method="POST">
                    
                            @csrf

                       
                        <div class="form-group">
                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Placa:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite aqui...">

                               
                            </select>
                        </div>
                        <br>
                        <br>


                        {{-- Cadastrar quant. resmas --}}

                        <div class="mb-3">
                            
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Materiais / Equipamentos:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite aqui...">
                          </div>

                          
                          {{--<div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Entrada</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Saída</label>
                          </div>--}}

                          
                          

                        <br><br>
                        <div class="container">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-outline-danger me-md-2" href="/historico"
                                    role="button"style="margin: 0 15px;">Cancelar</a>
                                <button type="submit" class="btn btn-outline-primary">Salvar</button>

                            </div>
                        </div>
                </div>
                
                </p>
            </div>
        </div>
    </div>
    
@endsection