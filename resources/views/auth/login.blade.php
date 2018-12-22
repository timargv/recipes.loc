@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5 py-sm-0">
        <div class="col-md-12 text-center text-uppercase h2 font-weight-bold mb-3">
            <a class="text-black-50 " href="{{ route('home') }}" style="text-decoration: none!important;">{{ config('app.name') }}</a>
        </div>
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-header bg-transparent text-center text border-0 px-0">
                    <a class="btn btn-primary w-100" href="{{ route('register') }}">{{ __('auth.SignUp') }}</a>
                </div>

                <div class="d-flex align-content-center flex-wrap bd-highlight mb-2">
                    <div class="flex-fill align-self-center p-0 bd-highlight border-bottom"></div>
                    <div class="align-self-center p-3 bd-highlight">{{ __('auth.OR') }}</div>
                    <div class="flex-fill align-self-center p-0 bd-highlight border-bottom"></div>
                </div>

                <div class="card-body p-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right"></label>--}}

                            <div class="col">
                                <input id="email" type="email" class="bg-light form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.E_Mail') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            <div class="col">
                                <input id="password" type="password" class="bg-light form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('auth.Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('auth.LoginIn') }}
                                </button>
                            </div>
                            <div class="col-12 text-center py-3 small">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                        {{ __('auth.ForgotYourPassword') }}
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
