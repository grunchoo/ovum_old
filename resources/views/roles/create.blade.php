@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header bg-danger text-white">Crear Roles</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        {!! Form::open(['route' => ['roles.store']]) !!}
    
                            @include('roles.partials.form')
    
                        {!! Form::close() !!}
     
                                
                    
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
