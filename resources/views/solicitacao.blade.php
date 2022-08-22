@extends('layouts.main')
@section('title', 'Novacap - Cadastro')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="mh-100" style="width: 1000px; height: 1000px;">
            <div class="card border-dark" style="max-width: 700rem;">
                <div class="card-header text-white" style="background-color: #044f84;">Cadastro</div>
                <div class="card-body text-dark">
                    <p class="card-text">


                        {{-- Cadastrar placa --}}

                    
                        <form action="{{ route('visitantes') }}" method="POST">
                    
                            @csrf

                        <div class="mb-3">
                            
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Placa:</label>
                            <input type="text" class="form-control" name="placa" placeholder="Digite aqui...">
                          </div>
                        <br>
                        <br>


                        {{-- Cadastrar nome motorista --}}

                        <div class="mb-3">
                            
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Nome:</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite aqui...">
                          </div>
                          <br>
                          <br>
                           {{-- Cadastrar materiais --}}

                          <div class="mb-3">
                            
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Materiais / Equipamentos:</label>
                            <input type="text" class="form-control" name="mat_equip" placeholder="Digite aqui...">
                          </div>

                        <br><br>
                        <div class="container">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-outline-danger me-md-2" href=""
                                    role="button"style="margin: 0 15px;">Cancelar</a>
                                <button type="submit" class="btn btn-outline-primary">Cadastrar</button>

                            </div>
                        </div>
                </div>
            </form>
                </p>
            </div>
        </div>
    </div>
@endsection