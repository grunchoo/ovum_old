@extends('layouts.admin')
@push('styles')

@endpush
@push('titulo')
<h4 class="">Carga de Datos Diarios</h4>
@endpush
@section('content')                    

<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

        @csrf
        <div class="info">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
<div class="row">
    <div class="col-md-4 pl-2">
        
        @foreach ($lotes as $item)
        <h3>{{$item->supplier->name}} | Lote #{{$item->lote}}</h3>
        <h3>{{$item->product->name}}</h3>
        <div class="widget bg-dark p-3 text-center pl-3 pr-3 border-right border-gray" >
            <h2 class="mb-0 text-primary">@if ($item->fecha_fin==null)
                {{$hoy->diffInDays($item->fecha_inicio)}}
                @else
                {{$item->fecha_fin->diffInDays($item->fecha_inicio)}}
            @endif</h2>
            <small>EDAD</small>
        </div>
        <div class="widget bg-dark p-3 text-center pl-3 pr-3 border-right border-gray" >
            <div class="d-flex justify-content-between">
                <div class="pl-4">
                    <h2 class="mb-0 text-primary">{{$item->hembras_actuales}}</h2>
                    <small>HEMBRAS ACTUALES</small>
                    
                </div>
                <div class="border-right border-gray"></div>
                <div class="pr-4">
                    <h2 class="mb-0 text-primary">{{$item->machos_actuales}}</h2>
                    <small>MACHOS ACTUALES</small>
                </div>
            </div>
            
        </div>
        @php
            $hembra = $item->hembras_actuales;
            $macho = $item->machos_actuales;
        @endphp
        @endforeach
    </div>
    <div class="col-md-8 pl-4">
        {!! Form::open(['route' => ['postura.store'],'files'=>true]) !!}  
        @include('postura.form')
    {!! Form::close() !!}
    </div>
</div>
        
        
</div>

    
@push('scripts')


@endpush

@endsection
