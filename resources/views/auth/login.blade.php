@extends('layouts.master')

@section('content')
<div class="container">
    <div id="signupbox" style=" margin-top:30px" class="mainbox col-md-7 col-md-offset-1 col-sm-7 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Login</div>
            </div>
            <div class="panel-body" >

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row col-md-offset-2">
                        <label for="rut" class="col-sm-2 col-form-label text-md-right">{{ __('Rut') }}</label>

                        <div class="col-md-7">
                            <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" required autofocus>

                            @if ($errors->has('rut'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col-md-offset-2">
                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-7">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col-md-offset-4">
                        <div class="controls col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row col-md-offset-4">
                        <div class="controls col-md-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
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

@endsection