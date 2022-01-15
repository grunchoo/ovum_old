<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>OVUM</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/authentication/form-1.css') }}" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    @laravelPWA
</head>
<body class="form">

    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <p class="pb-1"> <img src="{{ url('/images/ovum_logo2_blanco.svg') }}"  height="60" alt=""></p>
                        <h6 class="text-center" style="color: #F15A24">REGISTRO</h6>
                        <p class=" text-center signup-link register mb-3" style="color: #F15A24">Tenes una cuenta? <a class="badge mb-6" style="color: #fff" href="{{ route('login') }}">Ingresar</a></p>
                 
                            <form class="text-left" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div id="username-field" class="field-wrapper input p-1">
                                    <label class="mb-0" style="color: #F15A24" for="name">Nombre y Apellido</label>
                                    <input id="name" name="name" type="text" class="mb-0 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>

                                <div id="username-field" class="field-wrapper input p-1">
                                    <label class="mb-0" for="username" style="color: #F15A24">Nombre Usuario</label>
                                    
                                    <input id="username" name="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>

                                <div id="email-field" class="field-wrapper input p-1">
                                    <label class="mb-0" for="email" style="color: #F15A24">Correo</label>
                                    
                                    <input id="email" name="email" type="text" value="" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input p-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="mb-0" for="password" style="color: #F15A24">Contraseña</label>
                                        
                                    </div>
                                    
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                  
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    
                                </div>

                                <div id="password-field" class="field-wrapper input p-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="mb-0" for="password-confirm" style="color: #F15A24">Confirmación Contraseña</label> 
                                    </div>                               
                                        
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        
                                    
                                </div>

                                <div class="mt-2 col-md-12">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-block btn-success" value="">Comenzar!</button>
                                    </div>
                                </div>

                               

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>

</body>
</html>
