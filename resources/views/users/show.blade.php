@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-8 pr-0">
                <div class="card">
                    <div class="card-header">
                        {{ $user->name }}
                        <button class="p-0 btn btn-sm btn-light action-follow float-right" data-id="{{ $user->id }}">
                            <strong class="btn btn-sm @if(!auth()->user()->isFollowing($user)) btn-info text-white @endif" >
                                @if(auth()->user()->isFollowing($user))Отписаться@elseПодписаться@endif
                            </strong>
                        </button>
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

                @if(count($followings))
                    <div class="card">
                        <div class="card-header">
                            {{ $followings_title }}
                        </div>

                        <div class="card-body">
                            @include('follows._followings_profile', $followings)
                        </div>
                    </div>
                @endif

                @if(count($followers))
                    <div class="card @if(count($followings)) my-3 @else mb-3 @endif">
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

        {{--@include('users.wall.create_messages')--}}
        @include('users.wall.messages', $wall_messages)

    </div>


@endsection
