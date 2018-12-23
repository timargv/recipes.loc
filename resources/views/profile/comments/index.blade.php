@extends('layouts.app')

@section('title_page', 'Все комментария')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12 pr-sm-0">
                @foreach($comments as $comment)
                    <div class="card mb-3">
                        <div class="card-header">
                            @if ($comment->user->first_name && $comment->user->last_name)
                                {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                            @else
                                {{ $comment->user->name }}
                            @endif

                            {{ $comment->wall->title ?? ""}}
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $comment->body }}

                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@stop
