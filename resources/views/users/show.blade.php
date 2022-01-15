@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">           
            <div class="row">
                <div class="col-md-8 col-sm-8 p-3">
                    <h2 class="card-title ml-2">{{ $user->name }}</h2>
                    <p class="card-text ml-3"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text ml-3"><strong>Titulo:</strong> {{ $user->titulo }}</p>
                    <p class="card-text ml-3"><strong>Empresa:</strong> {{ $user->empresa }}</p>
                </div>
                <div class="col-md-4 col-sm-4 text-center p-3">
                    <img class="btn-md shadow-sm" src="/uploads/avatars/{{ $user->avatar }}" alt="" style="width:150px; height:150px; border-radius:50%;">
                </div>
            </div>
            
            <figure class="figure p-3">
                @if( $user->firma ==null )
                <h4>SIN FIRMA</h4>
                @else
                <img src="/uploads/firmas/{{ $user->firma }}" class="figure-img img-fluid rounded" >
                @endif
                
                <figcaption class="figure-caption text-center">Firma</figcaption>
            </figure>
             
        </div>
    </div>
</div>


@endsection