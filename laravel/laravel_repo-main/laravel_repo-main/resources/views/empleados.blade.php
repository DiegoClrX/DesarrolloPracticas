@extends('layouts.app')

@section('title', 'Empleados')
@section('active2', ' active')

@section('content')
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Cargo</th>
            <th>Erte</th>
        </tr>
        
        @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellidos }}</td>
                <td>{{ $empleado->dni }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{ $empleado->ciudad }}</td>
                <td>{{ $empleado->cargo }}</td>
                <td>
                    @if ($empleado->erte)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
        @endforeach

    </table>    
@endsection