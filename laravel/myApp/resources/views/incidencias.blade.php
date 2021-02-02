@extends('layouts.app')

@section('title', 'Incidencias')
@section('active1', 'active')
@section('contador', $contador)
@section('content')
    <table>
        <tr>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Ciudad</th>
            <th>Dirección</th>
            <th>Estado</th>
        </tr>
        @each('incidencia.show', $incidencias, 'incidencia')
    </table>    
@endsection



