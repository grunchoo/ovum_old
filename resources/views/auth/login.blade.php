<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>OVUM</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/authentication/form-1.css') }}" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    @laravelPWA
</head>
<body class="form">
    

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <p class="pb-4"> <img src="{{ url('/images/ovum_logo3_blanco.svg') }}"  height="60" alt=""></p>
                       
                        
                        <form class="text-left" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form">
                                <span style="color: #FFE033">Usuario</span>  

                                <div id="username-field" class="field-wrapper input">
                                    <!--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>-->
                                    
                                    <input id="username" type="username" placeholder="Usuario" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  autofocus>

                                    <!--input id="email" name="email"class="form-control " type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus-->
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <span style="color: #FFE033">Contraseña</span>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <!--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>-->
                                    <input id="password"  type="password"  placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div >
                                    
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-block font-weight-bold" style="background: #FFE033; color: #22262D" value="">Ingresar</button>
                                    </div>
                                    
                                </div>

                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-success">
                                        <label class="new-control new-checkbox checkbox-outline-success">
                                          
                                          <input  class="new-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                          <span class="new-control-indicator"></span>Mantener sesion iniciada
                                        </label>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    @if (Route::has('password.request'))
                                    <a  class="forgot-pass-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste la Contraseña?') }}
                                    </a>
                                @endif
                                    
                                </div>

                            </div>
                        </form>                        
                       
                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
                <div style="position: absolute;
                top: 150px;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #2c2c2c;
                background-position: center center;
                background-repeat: no-repeat;
                background-size: 75%;
                background-position-x: center;
                background-position-y: center;">
                <img src="{{ url('/images/intro.gif') }}"   alt="">
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-1.js"></script>

</body>
</html>