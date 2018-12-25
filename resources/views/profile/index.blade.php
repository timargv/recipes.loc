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
                <div class="card mb-3 border-0 shadow-sm">
                    {{--<div class="card-header">--}}
                        {{--{{ $title }}--}}
                    {{--</div>--}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-2">
                                <img class="rounded-circle w-100" src="https://via.placeholder.com/115/DDDDDD/FFFFFF/" alt="Card image">
                            </div>

                            <div class="col-7">
                                <ul class="list-unstyled">
                                    <li><b>Ник:</b> {{ $user->name }}</li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><b>Имя:</b> {{ $user->first_name }}</li>
                                    <li><b>Фамилия:</b> {{ $user->last_name }}</li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><b>E-mail:</b> {{ $user->email }}</li>
                                </ul>
                                <a href="{{ route('profile.edit') }}">РЕд</a>
                            </div>
                        </div>
                    </div>
                </div>


                {{--@include('profile._nav')--}}
                @include('profile.wall.messages', $wall_messages)

            </div>

        </div>





    </div>
@endsection
