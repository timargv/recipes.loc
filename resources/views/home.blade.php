@extends('layouts.app')

@section('title_page', 'Мне Интересно')

@section('content')
    <div class="">
        <div class="row">
        <div class="col-sm-8 ">
            <div class="card mb-4">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            @include('profile.wall.wall_followings', $wall_messages)
        </div>
        <div class="col-sm-4">
            @if(auth()->user()->followings->count())
                <div class="card">
                    <div class="card-header">
                        {{ __('Интересные люди') }}
                    </div>

                    <div class="card-body">
                        @include('follows._followings_profile', $followings = auth()->user()->followings)
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
