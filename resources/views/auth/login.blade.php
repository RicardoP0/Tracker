@extends('layouts.master')

@section('content')

    <style>
        .columnLabel {
            float: left;
            width: 30%;
            margin-left: 5%;
            padding: 0%;
            /*height: 300px; !* Should be removed. Only for demonstration *!*/
        }

        .columnInput {
            float: left;
            width: 40%;
            padding: 0%;
            /*height: 300px; !* Should be removed. Only for demonstration *!*/
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>


<div class="container">
    <div id="signupbox" style=" margin-top:30px" class="mainbox col-md-7 col-md-offset-1 col-sm-7 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Ingresar</div>
            </div>
            <div class="panel-body" >

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row" style="margin-bottom: 10px">
                        <div class="columnLabel">
                            <label for="rut" >{{ __('Rut') }}</label>
                        </div>
                        <div class="columnInput">
                            <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" required autofocus>

                            @if ($errors->has('rut'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px">
                        <div class="columnLabel">
                            <label for="password" >{{ __('Contraseña') }}</label>
                        </div>
                        <div class="columnInput">
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
                            <button type="submit" class="btn btn-primary">
                                {{ __('Ingresar') }}
                            </button>
                        </div>
                    </div>

                    {{--<div class="form-group row col-md-offset-4">--}}
                        {{--<div class="controls col-md-8">--}}
                            {{--<div class="form-check">--}}
                                {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                {{--<label class="form-check-label" for="remember">--}}
                                    {{--{{ __('Remember Me') }}--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                </form>

            </div>
        </div>
    </div>
</div>

@endsection