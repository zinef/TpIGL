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
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>
                    <a class="nav-link" href="{{ url('/') }}">{{ __('hello') }}</a>                        

                        <select>
                           
                            <option value="G1" >G1</option> 
                            <option value="G2">G2</option>
                            <option value="G3">G3</option>
                            
                         </select>
                    </th>
                
                </tr>
            </head>

            <body>
               
                @foreach($etudiant as $etud)
                <tr>
                    <td>{{ $etud->matricule}}</td>
                    <td></td>
                    <td></td>
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