@extends('blackTemplate')

@section('titulo')
        Personaje
@endsection

@section('seccion')

<table class="table table-dark table-striped">
    <thead>
        <tr>
        <th scope="col">id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Power</th>


        </tr>
      </thead>
      <tbody>
        <tr>


            <td><a>{{$arrayPowerful['id']}}</a></td>
            <td><a>{{$arrayPowerful['name']}}</a></td>
            <td><a>{{$arrayPowerful['description']}}</a></td>
            <td><a>{{$arrayPowerful['power']}}</a></td>


        </tr>
      </tbody>
</table>









@endsection
