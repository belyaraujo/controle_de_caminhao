@extends('layouts.main')
@section('title', 'Novacap - Histórico')
@section('content')

    <br><br>
   

    <div class="container">

        <a class="btn btn-outline-primary" href="/" role="button">CADASTRADOS</a>

        <a class="btn btn-outline-primary" href="/solicitacao" role="button">NOVO CADASTRO</a>
        <br><br>

        {{-- dd($solicitacao) --}}
        <div class="mh-100" style="width: 1200px; height: 1000px;">
            <div class="card border-dark" style="max-width: 700rem;">
                <div class="card-header text-white" style="background-color: #044f84;">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav justify-content-end">
                          <a type="button" class="btn btn-primary" href="/historico">Novacap</a>
                        </li>
                        <li class="nav justify-content-end">
                            <a type="button" class="btn btn-primary" href="/historico/visitante">Visitante</a>
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
                                <th scope="col">Nome</th>
                                <th scope="col">Material | Equipamento</th>
                                <th scope="col">Entrada</th>
                                <th scope="col">Saida</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($solicitacao as $solic)
                                <tr>

                                    <th value="{{ $solic->id }}">{{ $solic->id }}</th>
                                    <td value="{{ $solic->id }}">{{ $solic->placa }}</td>
                                    <td value="{{ $solic->id }}">{{ $solic->nome }}</td>
                                    <td value="{{ $solic->id }}">{{ $solic->mat_equip }}</td>
                                    <td value="{{ $solic->id }}">{{ $solic->created_at->format('d/m/Y H:i') }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </p>
                </div>

            @endsection

            