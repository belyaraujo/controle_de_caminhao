<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <style>
        /* Style the input field */
        #myInput {
            padding: 20px;
            margin-top: -6px;
            border: 0;
            border-radius: 0;
            background: #f1f1f1;
        }
    </style>

</head>

<body>



    @extends('layouts.main')
    @section('title', 'Novacap - Controle')
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


                            {{-- Cadastrar placas --}}

                        <form action="{{ route('cadastrados') }}" method="POST">
                            <br>
                            @csrf
                            <div class="form-group">
                                <label for="colFormLabelLg"
                                    class="col-sm-2 col-form-label col-form-label-lg">Placas:</label>
                                <select class="form-control" name="id_placa" id="id_placa">
                                    <option>Selecione uma placa</option>

                                    @foreach ($placa as $placa)
                                        <option value="{{ $placa->id }}">{{ $placa->placa }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <br>
                            <br>

                            {{-- Cadastrar materiais --}}

                            <div class="mb-3">

                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Materiais |
                                    Equipamentos:</label>
                                <input type="text" class="form-control" name="mat_equip" id="exampleFormControlInput1"
                                    placeholder="Digite aqui...">
                            </div>

                            <div class="alert alert-warning" role="alert">
                                Informe o código PRÉ-FIXO, em caso de saída de Equipamentos!
                            </div>



                            {{-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Entrada</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Saída</label>
                          </div> --}}

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <br><br>
                            <div class="container">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a class="btn btn-outline-danger me-md-2" href="{{ route('historico') }}"
                                        role="button"style="margin: 0 15px;">Cancelar Cadastro</a>
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


</body>
