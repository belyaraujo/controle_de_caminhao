@extends('layouts.main')
@section('title', 'Novacap - Histórico')
@section('content')

    <br><br>
    <script>
        /*function chamaId(id) {
                    var id ;

                    event.preventDefault();

                    document.getElementById('materialteste').value = id;

                    $('#EditModal').modal('show');


                }*/

        function chamaId(id) {
            var id;

            event.preventDefault();

            document.getElementById('materialteste').value = id;
            document.getElementById('materialteste').submit();

            // document.getElementById("mySubmit").disabled = true;

            $('#EditModal').modal('show');


        };
    </script>


    <div class="container">

        <a class="btn btn-outline-primary" href="{{ route('cadastro') }}" role="button">CADASTRADOS</a>

        <a class="btn btn-outline-primary" href="{{ route('solicitacao') }}" role="button">NOVO CADASTRO</a>
        <br><br>

        @if (session('msg'))
            <div class="alert alert-success" role="alert">
                <p class="msg">
                    {{ session('msg') }}
                </p>
            </div>
        @endif

        {{-- dd($solicitacao) --}}
        <div class="mh-100" style="width: 1200px; height: 1000px;">
            <div class="card border-dark" style="max-width: 700rem;">
                <div class="card-header text-white" style="background-color: #044f84;">Visitantes
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav justify-content-end">

                                <a type="button" class="btn btn-primary" style="margin: 0 15px;"
                                    href="{{ route('historico') }}">Novacap</a>
                            </li>
                            <li class="nav justify-content-end">
                                <a type="button" class="btn btn-primary" href="{{ route('visitante') }}">Visitante</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body text-dark">
                    <p class="card-text">

                    <table class="table table-hover">
                        <thead class="table-primary" style="background-color:	#cae8f5;">
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Material | Equipamento</th>
                                <th scope="col">Entrada</th>
                                <th scope="col">Saida</th>
                                <th scope="col">Material | Equipamento</th>
                                <th scope="col">Salvar informação</th>


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
                                    <td value="{{ $solic->id }}">{{ $solic->updated_at->format('d/m/Y H:i') ?? '-' }}
                                    </td>
                                    <td value="{{ $solic->id }}">{{ $solic->mat_equip2 }}</td>
                                    <td colspan="1">
                                        @if ($solic->ativo === '1')
                                            <button type="button" class="btn btn-success update" data-bs-toggle="modal"
                                                data-bs-target="#EditModal" data-id="{{ $solic->id }}"
                                                onClick="chamaId(id)" id="{{ $solic->id }}">
                                                Salvar
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success" disabled> Salvar </button>
                                    </td>
                            @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        </div>
        <form onSubmit="return onSubmit()" action="{{ route('atualizar2', $solic->id) }}" method="POST">
            <br>
            @csrf

            <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Salvar retorno</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <input type="text" id="materialteste" value="{{ $solic['id'] }}" name="id" hidden>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Materiais |
                                    Equipamentos:</label>
                                <input type="text" class="form-control" name="mat_equip2" id="exampleFormControlInput1"
                                    placeholder="Digite aqui...">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
