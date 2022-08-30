@extends('layouts.main')
@section('title', 'Novacap - Histórico')
@section('content')

    <br><br>
   

    <div class="container">

        <a class="btn btn-outline-primary" href="{{ route('cadastrados') }}" role="button">CADASTRADOS</a>

        <a class="btn btn-outline-primary" href="/solicitacao" role="button">NOVO CADASTRO</a>
        <br><br>

        {{-- dd($solicitacao) --}}
        <div class="mh-100" style="width: 1200px; height: 1000px;">
            <div class="card border-dark" style="max-width: 700rem;">
                <div class="card-header text-white" style="background-color: #044f84;">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav justify-content-end">
                          <a type="button" class="btn btn-info" href="/historico">Novacap</a>
                        </li>
                        <li class="nav justify-content-end">
                            <a type="button" class="btn btn-info" href="/historico/visitante">Visitante</a>
                          </li>

                </ul> 
                </div>
            </div>
                <div class="card-body text-dark">
                    <p class="card-text">
                        
                    <table class="table table-hover">
                        <thead class="table-primary" style="background-color: 	#E1F5FE;">
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Material | Equipamento</th>
                                <th scope="col">Entrada</th>
                                <th scope="col">Saida</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope="col">1</th>
                                <th scope="col">ABC1234</th>
                                <th scope="col">areia e cimento</th>
                                <th scope="col">16/08/2022 - 15:40 </th>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                </div>

            @endsection

            