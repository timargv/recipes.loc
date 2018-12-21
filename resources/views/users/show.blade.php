@extends('layouts.app')

@section('title_page')
    @if ($user->first_name && $user->last_name)
        {{ $user->first_name }} {{ $user->last_name }}
    @else
        {{ $user->name }}
    @endif
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12 pr-sm-0">
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
                        <div class="row">
                            <div class="col-4">
                                <img class="rounded-circle" src="https://via.placeholder.com/115/DDDDDD/FFFFFF/" alt="Card image">
                            </div>

                            <div class="col-8">
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
                </div>
            </div>
            <div class="col-sm-4 ml-sm-0 mt-sm-0 mt-3">

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
