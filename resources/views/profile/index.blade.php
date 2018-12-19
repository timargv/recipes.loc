@extends('layouts.app')

@section('content')
    <div class="ml-3">
        <div class="row">
            <div class="col-8 pr-0">
                <div class="card">
                    <div class="card-header">
                        {{ $title }}
                    </div>

                    <div class="card-body">
                        <ul>
                            <li><b>Ник:</b> {{ $user->name }}</li>
                        </ul>
                        <ul>
                            <li><b>Имя:</b> {{ $user->first_name }}</li>
                            <li><b>Фамилия:</b> {{ $user->last_name }}</li>
                        </ul>
                        <ul>
                            <li><b>E-mail:</b> {{ $user->email }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-4 ml-0">
                <div class="card">
                    <div class="card-header">
                        Подписки - {{ $followings_count }}
                    </div>

                    <div class="card-body">
                        @include('follows._followings_profile', $followings)
                    </div>
                </div>

                <div class="card my-3">
                    <div class="card-header">
                        Подписчики - {{ $followers_count }}
                    </div>

                    <div class="card-body">
                        @include('follows._followers_user', $followers)
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-3">
            <div class="card-header">
                {{ $title_wall }}
            </div>

            <div class="card-body">
                <form action="{{ route('profile.wall.messages.store', $user) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="5" required>{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
                    </div>
                </form>
            </div>
        </div>

        @include('profile._messages_wall', $wall_messages)

    </div>
@endsection
