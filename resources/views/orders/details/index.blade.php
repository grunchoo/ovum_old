@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Lista de ordenes</h3>
    <table  data-sortable class="table table-sm table-hover ">
        <thead>
            <tr>
                <th width="50px" >Id</th>
                <th width="250px">Cliente</th>
                <th width="100px" class="text-center">Fecha Entrega</th>
                <th width="100px" class="text-center">Fecha Solicitud</th>
                <th width="70px" class="text-center">Estado</th>
                <th width="70px" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $row)
        <td>{{ $row->id }}</td>
        <td>{{ $row->customer->name }}</td>
        <td>{{ $row->fecha_entrega }}</td>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->status }}</td>
        <td></td>
        @endforeach
        </tbody>
    </table>
</div>
@endsection