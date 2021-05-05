@extends('template')

@section('titulo')
        Ingreso de personajes
@endsection

@section('seccion')

@foreach (characters as $character)

<input type="text" name="id" value="{{$character['id']}}" readonly>
<input type="text" name="id" value="{{$character['name']}}" readonly>
<input type="text" name="id" value="{{$character['description']}}" readonly>
<input type="text" name="id" value="{{$character['power']}}" readonly>

@endforeach




@endsection
