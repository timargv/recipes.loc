@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
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
        <div class="col-2">
{{--            @include('follows._followings_profile', $followings)--}}
        </div>
    </div>
</div>
@endsection
