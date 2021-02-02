@extends('layouts.app')

@section('title', $mensaje)
@section('active2', ' active')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="/empleados" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nombre">nombre</label>
        <input class="form-control" name="nombre" id="nombre" type="text" value="{{ old('nomber') }}">
    </div>

    <div class="form-group">
        <label for="apellidos">apellidos</label>
        <input class="form-control" name="apellidos" id="apellidos" type="text" value="{{ old('apellidos') }}">
    </div>

    <div class="form-group">
        <label for="dni">dni</label>
        <input class="form-control" name="dni" id="dni" type="text" value="{{ old('dni') }}">
    </div>

    <div class="form-group">
        <label for="direccion">direccion</label>
        <input class="form-control" name="direccion" id="direccion" type="text" value="{{ old('direccion') }}">
    </div>

    <div class="form-group">
        <label for="ciudad">ciudad</label>
        <input class="form-control" name="ciudad" id="ciudad" type="text" value="{{ old('ciudad') }}">
    </div>

    <div class="form-group">
        <label for="ciudad">ciudad</label>
        <input class="form-control" name="ciudad" id="ciudad" type="text" value="{{ old('ciudad') }}">
    </div>

    <div class="form-group">
        <label for="cargo">cargo</label>
        <input class="form-control" name="cargo" id="cargo" type="text" value="{{ old('cargo') }}">
    </div>

    <div class="form-group">
        <label for="erte">erte</label>
        <input class="form-check-input" name="erte" id="erteUno" type="radio" value= '1' checked>
        <label for="form-check-input" for="erteUno">
            Esta en erte
        </label>
    </div>
    <div class="form-group">
        <label for="erte">erte</label>
        <input class="form-check-input" name="erte" id="erteDos" type="radio" value= '0'>
        <label for="form-check-input" for="erteDos">
            No esta en erte
        </label>
    </div>

    <input type="submit" value="Crear">
</form>

@endsection
