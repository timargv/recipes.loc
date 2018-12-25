@extends('layouts.app')

@section('title_page', __('profile.Edit'))

@section('content')
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8 mb-3 pr-md-0">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0 bg-info text-white">{{ __('profile.Edit') }}</div>
                    <div class="card-body">

                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('auth.UserName') }}</label>
                                <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" placeholder="{{ __('auth.UserName') }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="first_name" class="col-form-label">{{ __('auth.FirstName') }}</label>
                                <input id="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="{{ __('auth.FirstName') }}" required>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('first_name') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-form-label">{{ __('auth.LastName') }}</label>
                                <input id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="{{ __('auth.LastName') }}" required>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">{{ __('auth.Password') }}</label>
                                <input id="password" placeholder="******" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('auth.E_Mail') }}</label>
                                <input id="name" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required disabled>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('profile.Save') }}</button>
                                <a class="btn btn-danger float-right" href="{{ URL::previous() }}">{{ __('profile.Back') }}</a>
                            </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm ">
                    <div class="card-img px-5 py-3">
                        <img src="{{ $user->getImageThumbnail(auth()->id()) }}" alt="" class="card-img rounded-circle border">
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <div class="custom-file ">
                                <input type="file" name="avatar" class="custom-file-input" id="customFile">
                                <label class="custom-file-label label-avatar border-white" for="customFile" >{{ __('Хотите поменять?') }}</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-dark w-100">{{ __('profile.Save') }}</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <style type="text/css">
        .label-avatar::after {
            content: 'Аватар' !important;
            color: #ffffff !important;
            background-color: #6cb2eb !important;
        }
    </style>
@endsection
