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
        </div>
        <div class="col-2">
            <ul class="nav">
                @foreach($followings as $following)
                    @if($following->first_name == null ||  $following->last_name == null)
                        <li class="nav-item"><a href="{{ route('user.show', $following) }}">{{ $following->name }}</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('user.show', $following) }}">{{ $following->first_name }} {{ $following->last_name  }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
