@extends('layouts.app')

@section('title_page', $wall_message->title)

@section('content')
    <div class="row">
        <div class="p-0 pl-md-3 p-md-auto col-md-8">
            <div class="shadow-sm card rounded-0 border-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex bd-highlight">
                        <div class="align-self-center">
                            <img class="rounded-circle" src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image">
                        </div>
                        <div class="align-self-center bd-highlight">
                            <span class="pl-2 card-subtitle text-muted text-dark">
                                @if ($wall_message->user->first_name && $wall_message->user->last_name)
                                    {{ $wall_message->user->first_name }} {{ $wall_message->user->last_name }}
                                @else
                                    {{ $wall_message->user->name }}
                                @endif
                            </span>
                        </div>
                        <div class="ml-auto align-self-center">
                            <form method="POST" action="{{ route('profile.wall.messages.destroy', $wall_message) }}" class="d-inline float-right">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link bg-transparent text-black-50">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <a class="card-img" href="{{ route('profile.wall.messages.show.message', ['user' => $wall_message->user, 'message' => $wall_message]) }}">
                    <img class="card-img-top rounded-0" src="https://via.placeholder.com/293x180/DDDDDD/FFFFFF/?text=Laravel" alt="Card image">
                </a>
                <div class="card-body">
                    <div class="card-title h3 font-weight-bold">{{ $wall_message->title }}</div>
                    <p class="card-text">
                        {{ $wall_message->description }}
                    </p>
                </div>
                <div class="card-footer border-0 position-relative pt-1 pb-0">
                    <div class="mb-1">
                        <nav class="nav d-flex bd-highlight" style="font-size: 1.3rem">
                            @if($wall_message->isLikedBy(auth()->user()))
                                <button class="align-self-center bd-highlight mr-1 btn bg-transparent p-0 action-like" data-id="{{ $wall_message->id }}"><i id="favIcon-{{ $wall_message->id }}" class="float-left fa fa-heart text-danger"></i></button>
                            @else
                                <button class="align-self-center bd-highlight mr-1 btn bg-transparent p-0 text-muted action-like" data-id="{{ $wall_message->id }}"><i id="favIcon-{{ $wall_message->id }}" class="float-left fa fa-heart-o text-black-50"></i></button>
                            @endif
                            <div class="align-self-center bd-highlight mr-4 text-muted small text-black-50">
                                <span class="count-like-{{ $wall_message->id }} border-0 bg-transparent position-relative">{{ $wall_message->fans()->count() }}</span>
                            </div>
                            {{--<a class="align-self-center bd-highlight mr-1" href="{{ route('profile.wall.messages.show.message', ['user' => $wall_message->user, 'message' => $wall_message]) }}"><i class="fa fa-comment-o text-dark"></i></a>--}}
                            {{--<span class="align-self-center bd-highlight text-muted small text-black-50">{{ $wall_message->getCommentsCount() }}</span>--}}
                            {{--<a class="mr-2" href="#"><i class="fa fa-share text-dark"></i></a>--}}
                            <a class="align-self-center bd-highlight ml-auto" href="#"><i class="fa fa-bookmark-o text-black-50"></i></a>
                        </nav>
                    </div>
                </div>
                <div class="py-3 bg-white border-top border-white sticky-top shadow-sm mb-3">
                    @include('profile.wall._comment_add')
                </div>
                <div class="card-footer border-0 bg-transparent position-relative">
                    <div class="row">
                        <div class="px-3">
                            @include('profile.comments._list', $comments)
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            ss
        </div>
    </div>
@stop
