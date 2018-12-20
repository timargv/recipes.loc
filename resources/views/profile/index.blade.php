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
                @if($followings_title)
                <div class="card">
                    <div class="card-header">
                        {{ $followings_title }}
                    </div>

                    <div class="card-body">
                        @include('follows._followings_profile', $followings)
                    </div>
                </div>
                @endif

                @if($followers)
                <div class="card @if($followings) my-3 @else mb-3 @endif">
                    <div class="card-header">
                        {{ $followers_title }}
                    </div>

                    <div class="card-body">
                        @include('follows._followers_user', $followers)
                    </div>
                </div>
                @endif
            </div>
        </div>



        @include('profile.wall.create_messages')
        @include('profile.wall.messages', $wall_messages)

    </div>
@endsection
