@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>La liste des etudiants</h1>
            <table class="table">
                <head>
                <tr>
                    <th>Matricule</th>
                
                </tr>
            </head>

            <body>
               
                @foreach($etudiant as $etud)
                <tr>
                    <td>{{ $etud->matricule}}</td>
                    <td>
                        <a href="/saisirnotes/{{$etud->id}}" class="btn btn-primary">Saisir</a>
                    </td>
                </tr>
                @endforeach
            </body>
            </table>
        </div>
    </div>
</div>
@endsection