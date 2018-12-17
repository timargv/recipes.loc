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

                        {{ $user->followers()->get() }}
                    </div>
                </div>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
@endsection
