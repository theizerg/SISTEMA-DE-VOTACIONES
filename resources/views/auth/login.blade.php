@extends('layouts.adminfront')
@section('title', 'Inicio de Sesión')

@section('content')<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <img src="{{asset('images/logo/logo_color.png')}}" class="user-image" alt="User Image">
             <div class="float-right">
                        <small>AsojuBandes</small>

                    </div>

                    <div class="float-right"><br><br><br><br>
                        <h3>Votaciones Jubilados</h3>

                    </div>
               </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="main-form" autocomplete="off">
                        @csrf

                        <div class="form-group row">
                            <label for="nu_cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

                            <div class="col-md-6">
                                <input id="nu_cedula" type="nu_cedula" class="form-control @error('nu_cedula') is-invalid @enderror" name="nu_cedula" value="{{ old('nu_cedula') }}" required autocomplete="nu_cedula" autofocus>

                                @error('nu_cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-spinner fa-pulse"></i> {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
