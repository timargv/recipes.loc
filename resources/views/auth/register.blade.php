@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5 py-sm-0">
        <div class="col-md-12 text-center text-uppercase h2 mt-5 mt-sm-0 font-weight-bold mb-3">
            <a class="text-black-50 " href="{{ route('home') }}" style="text-decoration: none!important;">{{ __('Recipes') }}</a>
        </div>
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-header bg-transparent text-center text border-0 px-0">
                    <a class="btn btn-primary w-100" href="{{ route('login') }}">{{ __('auth.LoginIn') }}</a>
                </div>

                <div class="d-flex align-content-center flex-wrap bd-highlight mb-2">
                    <div class="flex-fill align-self-center p-0 bd-highlight border-bottom"></div>
                    <div class="align-self-center p-3 bd-highlight">{{ __('auth.OR') }}</div>
                    <div class="flex-fill align-self-center p-0 bd-highlight border-bottom"></div>
                </div>

                <div class="card-body p-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            <div class="col-12">
                                <input id="name" type="text" class="bg-light form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('auth.UserName') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="first_name" class="bg-light form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="{{ __('auth.FirstName') }}" required>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('first_name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="last_name" class="bg-light form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="{{ __('auth.LastName') }}" required>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            <div class="col-12">
                                <input id="email" type="email" class="bg-light form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.E_Mail') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            <div class="col-12">
                                <input id="password" type="password" class="bg-light form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('auth.Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                        <div class="col-12">
                        <div class="form-group row">
                                <input id="password-confirm" type="password" class="bg-light form-control" name="password_confirmation" placeholder="{{ __('auth.ConfirmPassword') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('auth.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
