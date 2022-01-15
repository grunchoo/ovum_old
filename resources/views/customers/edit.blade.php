@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="toast alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="bio layout-spacing ">
        <div class="widget-content widget-content-area">
            <h3 class="">Info de Contacto</h3>
            {!! Form::model($customer, ['route' => ['customers.update', $customer->id],
            'method' => 'PUT','files'=>true]) !!}

        @include('customers.forms.f-edit')

            {!! Form::close() !!}

            <p></p>
            <p style="mb-3"><br></p>
        </div>                                
    </div>
</div>



@endsection