@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header bg-danger text-white">Editar Usuario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {!! Form::model($user, ['route' => ['users.update', $user->id],
                    'method' => 'PUT','files'=>true]) !!}

                        @include('users.partials.form')

                    {!! Form::close() !!}
 
                            
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
