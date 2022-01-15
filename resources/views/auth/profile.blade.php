@extends('layouts.admin')
@push('styles')
<link href={{ asset('plugins/dropify/dropify.min.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('assets/css/users/account-setting.css') }} rel="stylesheet" type="text/css" /> 
@endpush
@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="info">
            <h4 class="">Perfil</h4>
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
                <div class="col-lg-11 mx-auto">
                    
                    <div class="form-row">
                        <div class="col-xl-2 col-lg-12 col-md-4">
                            <div class="upload mt-4 pr-md-4">
                                <input type="file" id="profile_image" class="dropify" data-default-file="storage/.{{ auth()->user()->profile_image }}" data-max-file-size="5M" name="profile_image" />
                                <p class="mt-2 text-center"><i class="fas fa-cloud-upload mr-1"></i></i> Cargar Imagen</p>
                            </div>
                        </div>

                        
                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0">
                            <div class="form mt-4">
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input id="name" type="text" class="form-control  mb-4" name="name" value="{{ old('name', auth()->user()->name) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="username">Usuario</label>
                                            <input id="username" type="text" class="form-control  mb-4" name="username" value="{{ old('username', auth()->user()->username) }}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control mb-4" name="email" value="{{ old('email', auth()->user()->email) }}" >
                                </div>
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input id="phone" type="text" class="form-control mb-4" name="phone" value="{{ old('phone', auth()->user()->phone) }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

                
        
        <div class="form-group row mb-0 mt-5">
            <div class="col-md-8 offset-md-2 ">
                <button type="submit" class="btn btn-block btn-primary">Actualizar Perfil</button>
            </div>
        </div>
    </form>
</div>

            
@push('scripts')
<script src="{{ asset('plugins/dropify/dropify.min.js') }}" defer></script>
<script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}" defer></script>
<script src="{{ asset('assets/js/users/account-settings.js') }}" defer></script>

@endpush

@endsection

