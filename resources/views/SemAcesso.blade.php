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
    @section('title', 'Novacap - Relatorio')
    @section('content')

    <div class="container">
      <br><br><br>
      <div class="alert alert-danger" role="alert">
        Você não tem permissão nessa página!
      </div>
<br><br><br>
      <div class="d-grid gap-2 col-2 mx-auto">
        <a type="button" class="btn btn-primary me-md-2" href="{{ route('cadastro') }}">Voltar</a>
        
      </div>
    </div>
    @endsection
</body>