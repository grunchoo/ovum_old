@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu Correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo link de verificación a tu correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder por favor revisa tu correo.') }}
                    {{ __('No recibiste el Mail?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aqui para solicitar nuevo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
