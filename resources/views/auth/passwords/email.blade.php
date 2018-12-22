@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12 text-center text-uppercase h2  mt-sm-0 font-weight-bold mb-3">
                <a class="text-black-50 " href="{{ route('home') }}" style="text-decoration: none!important;">{{ __('Recipes') }}</a>
            </div>
            <div class="col-12 text-center">
                <p class="font-weight-light text-muted">{{ __('auth.ResetPassword') }}</p>
            </div>
            <div class="col-md-6">
                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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

                        <div class="form-group row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('auth.SendPasswordResetLink') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card border-0">
                    <div class="d-flex align-content-center flex-wrap bd-highlight mt-0">
                        <div class="flex-fill align-self-center p-0 bd-highlight border-bottom"></div>
                        <div class="align-self-center p-3 bd-highlight">{{ __('auth.OR') }}</div>
                        <div class="flex-fill align-self-center p-0 bd-highlight border-bottom"></div>
                    </div>

                    <div class="card-header bg-transparent text-center text border-0 px-0">
                        <a class="btn btn-primary w-100" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                    </div>
                    <div class="card-header bg-transparent text-center text border-0 px-0">
                        <a class="btn btn-primary w-100" href="{{ route('login') }}">{{ __('auth.LoginIn') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
