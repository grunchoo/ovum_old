@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="toast alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open(['route' => ['prodor.store'],'files'=>true]) !!}
    
 

        @include('prodor.forms.f-create')

    {!! Form::close() !!}

</div>
@endsection