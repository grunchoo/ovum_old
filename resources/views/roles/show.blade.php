@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">Rol</div>

                <div class="card-body">
                                       
                   <p><strong>Nombre</strong> {{ $role->name }}</p>
                   <p><strong>Email</strong> {{ $role->slug }}</p>
                   <p><strong>Descripción</strong> {{ $role->description }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
