@extends('layouts.app')

@section('title_page', 'Мне Интересно')

@section('content')
<div class="row">
    <div class="col-md-12 ml-md-0 px-sm-0 px-md-3">
    <div class="row">
        <div class="col-md-8 ">
            <div class="card border-0 shadow-sm mb-4">
                {{--<div class="card-header border-0">{{ $title }}</div>--}}

                <div class="card-body p-2">
                    <a class="d-flex btn bg-transparent p-0" href="{{ route('profile.wall.messages.create') }}">
                        <div class="align-self-center mr-3">
                            <img class="border rounded-circle" src="{{ $user->getImageThumbnail(auth()->id()) }}" width="50px" height="50px" alt="Card image">
                        </div>
                        <div class="align-self-center mr-auto">
                            <span class="text-muted">Что у Вас нового?</span>
                        </div>
                    </a>
                </div>
            </div>

            @include('profile.wall.wall_followings', $wall_messages)
        </div>
        <div class="col-md-4">
            @if(auth()->user()->followings->count())
                <div class="card border-0 shadow-sm ">
                    <div class="card-header border-0">
                        {{ __('feed.FollowingUserTitle') }}
                    </div>

                    <div class="card-body">
                        @include('follows._followings_profile', $followings = auth()->user()->followings)
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
</div>
@endsection
