@extends('layouts.main')
@section('title', 'Novacap - Histórico')
@section('content')

    <br><br>
    <script>
        function chamaId(id) {
            var id ;

            event.preventDefault();

            document.getElementById('materialteste').value = id;

            $('#EditModal').modal('show');


        }

        
        /*$('.update').on('click', function chamaId(id){
            //var id ;
            var id    = button.data('id')
            var modal = $(this)modal.find('#id').val(id);


      $('#EditModal').modal('show'); // modal aparece
});*/

/*$(document).on("click", function chamaId(id) {
        var id = $(this).attr('data-id');
        event.preventDefault();

            document.getElementById('materialteste').value = id
        $('#EditModal').modal('show').val(meuid);
    });*/


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
                <div class="card-header text-white" style="background-color: #044f84;">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav justify-content-end">
                                <a type="button" class="btn btn-primary me-md-2" href="/historico">Novacap</a>
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
                        <thead class="table-primary" style="background-color: 	#cae8f5;">
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Material | Equipamento</th>
                                <th scope="col">Saida</th>
                                <th scope="col">Retorno</th>
                                <th scope="col">Material | Equipamento</th>
                                <th scope="col">Salvar informação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cadastro as $cadas)
                                <tr>
                                    <th value="{{ $cadas->id }}">{{ $cadas->id }}</th>
                                    <td value="{{ $cadas->id }}">{{ $cadas->placas->placa }}</td>
                                    <td value="{{ $cadas->id }}">{{ $cadas->mat_equip }}</td>
                                    <td value="{{ $cadas->id }}">{{ $cadas->created_at->format('d/m/Y H:i') }}</td>
                                    <td value="{{ $cadas->id }}">{{ $cadas->updated_at->format('d/m/Y H:i') ?? '-' }}
                                    </td>
                                    <td value="{{ $cadas->id }}">{{ $cadas->mat_equip2 }}</td>

                                    {{--<td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EditModal"
                                      onClick="document.getElementById('materialteste').value= {{$cadas->id}}">
                                        Salvar
                                      </button></td>--}}

                                    <td colspan="1">
                                        <div id="botao">
                                            <button type="button" class="btn btn-success update" data-bs-toggle="modal"
                                                data-bs-target="#EditModal" data-id="{{ $cadas->id }}"
                                                onClick="chamaId(id)" id="{{ $cadas->id }}">
                                                Salvar
                                            </button>
                                        </div>
                                    </td>

                                    {{--<td colspan="1">
                                        <div id="yourFormId" name = "yourFormId" class = "submitBtn">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#EditModal" data-id="{{ $cadas->id }}"
                                                onClick="chamaId(id)" id="{{ $cadas->id }}">
                                                Salvar
                                            </button>
                                        </div>
                                    </td>--}}

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </p>

                    <form action="{{ route('atualizar', $cadas->id) }}" method="POST">
                        <br>
                        @csrf
                        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Salvar retorno</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <input type="text" id="materialteste" value="{{$cadas['id']}}"
                                            name="id">
                                            

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Materiais |
                                                Equipamentos:</label>
                                            <input type="text" class="form-control" name="mat_equip2"
                                                id="exampleFormControlInput1" placeholder="Digite aqui...">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-outline-primary">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endsection
