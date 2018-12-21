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
                    {{--<div class="card-header">--}}
                        {{--{{ $title }}--}}
                    {{--</div>--}}
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



                @include('profile.wall.create_messages')
                @include('profile.wall.messages', $wall_messages)

            </div>

        </div>





    </div>
@endsection
