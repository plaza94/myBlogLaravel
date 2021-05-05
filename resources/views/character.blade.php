@extends('blacktemplate')

@section('titulo')
        Ingreso de personajes
@endsection

@section('seccion')

@if ($errors->any())
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">

        <div class="alert alert-danger d-flex justify-content-center">
            <a>HAY ERRORES</a>
            <ul>

                @if ($errors->first('power'))
                <li>el campo power debe ser de tipo numerico </li>
                @endif

                @if ($errors->first('name'))
                <li>el campo nombre no puede estar vacio </li>
                @endif

                @if ($errors->first('description'))
                <li>el campo description no puede estar vacio </li>
                @endif


            </ul>
        </div>

    </div>
    <div class="col-3"></div>

</div>
@endif

    <br></br>

<div class="row">
    <div class="col-3"><h3>Ingrese su personaje</h3></div>
    <div class="col-9">

        <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Power</th>

            </tr>
          </thead>
          <tbody>
            <tr>

               <form method="POST" action="{{route('enterCharacter')}}">
                @csrf
                <td><input type="text" id="name" name="name"><br></td>
                <td><input type="text" id="description" name="description"><br></td>
                <td><input type="text" id="power" name="power"><br></td>
                <td><input type="submit" value="Ingresar personaje"></td>
                </form>

            </tr>
          </tbody>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-3">
        <h3 align="center">Busqueda de Personajes</h3>
    </div>
    <div class="col-6">
        <a href="{{route('mostPowerfulCharacter')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="width:300px; margin:0 auto;">Personaje mas poderoso</a>
    </div>
    <div class="col-3">
        <a href="{{route('lessPowerfulCharacter')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="width:300px; margin:0 auto;">Personaje menos poderoso</a>
    </div>
</div>


<br></br>
<div class="row">

    <div class="col-3">
        <form class="form-incline float-right">
            <input type="search" class="form-control rounded" placeholder="Buscar" aria-label="Search" aria-describedby="search-addon" name="search"/>
    </div>
    <div class="col-6">
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
        </form>

    </div>
    <div class="col-3"></div>

</div>

<br></br>






<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Power</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>

        <tbody>

            @forelse ($characters as $character)
        <tr>

            <form method="POST" action="{{route('updateCharacter')}}">
            @csrf

            <input type="hidden" name="id" id="id"value="{{$character->id}}" >
              <td scope="col"><label> {{$character->id}}</label></td>
              <td scope="col"><input type="text" name="name" value="{{$character->name}}"></td>
              <td scope="col"><input type="text" name="description" value="{{$character->description}}"></td>
              <td scope="col"><input type="text" name="power" value="{{$character->power}}"></td>
              <td><input type="submit" value="Actualizar" class="btn btn-success btn-rounded btn-sm my-0"></td>


            </form>

              <td scope="col">

            <form method="POST" action="{{route('deleteCharacter')}}" class="formulario-eliminar" >
                @csrf
                    <td><input type="hidden" name="id" value="{{$character->id}}" readonly><br></td>
                    <td><input type="submit" value="Eliminar" class="btn btn-xs btn-danger delete" name="boton-eliminar"></td>
            </form>

               </td>

        </tr>
            @empty
            <li> No hay personajes </li>
            @endforelse




          </tbody>
</table>


@endsection



<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>

$('.formulario-eliminar').click(function (e) {

e.preventDefault();

Swal.fire({
  title: 'está seguro?',
  text: "este registro sera eliminado permanentemente",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }
});
});

</script>


