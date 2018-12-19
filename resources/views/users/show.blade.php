@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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
                        @include('follows._followers_user', $followers)
                    </div>
                </div>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
@endsection
