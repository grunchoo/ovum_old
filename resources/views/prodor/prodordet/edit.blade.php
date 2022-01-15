@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="toast alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="mb-6 pb-4">
        <h5>Nacimiento Nº: {{$ponele}} - <span>Lote:  {{$prodordet->lote->name}}</span></h5>
    </div>
    <div>
        {!! Form::model($prodordet, ['route' => ['prodordet.update', $prodordet->id], 'method' => 'PUT','files'=>true]) !!}
            @include('prodor.forms.f-edit')
        {!! Form::close() !!}
    </div>
</div>
@endsection
