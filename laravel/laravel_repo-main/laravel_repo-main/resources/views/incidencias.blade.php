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
            <th>Nivel</th>
        </tr>
        @each('incidencia.show', $incidencias, 'incidencia')
    </table>    

    <div>{{ $incidencias->links() }}</div>
    

@endsection



