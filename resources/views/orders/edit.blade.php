@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="toast alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    
{!! Form::model($order, ['route' => ['orders.update', $order->id],
'method' => 'PUT','files'=>true]) !!}
 

        @include('orders.forms.f-edit')

    {!! Form::close() !!}

</div>
@endsection
