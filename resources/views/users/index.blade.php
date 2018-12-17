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
                            <ul class="list-group list-group-flush">
                            <div class="infinite-scroll">
                                @foreach($users as $user)
                                    <li class="list-group-item px-0 ">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="https://pp.userapi.com/c623928/v623928512/35f14/MweWozAQs_U.jpg" class="w-100 rounded-circle float-left" alt="...">
                                            </div>
                                            <div class="col-10 pl-0 pt-2">
                                                <div class="row">
                                                    <div class="col-8 font-weight-bold ">
                                                        <a class="text-dark" href="{{ route('user.show', $user) }}">{{ $user->name }}</a>
                                                    </div>
                                                    <div class="col-4">
                                                        @if(auth()->user()->isFollowing($user))
                                                            <button class="p-0 btn btn-sm btn-light action-follow float-right" data-id="{{ $user->id }}">
                                                                <strong class="btn btn-sm">
                                                                    @if(auth()->user()->isFollowing($user))
                                                                        Отписаться
                                                                    @endif
                                                                </strong></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<p class="mb-2">--}}
                                            {{--<small>Following: <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></small>--}}
                                            {{--<small>Followers: <span class="badge badge-primary tl-follower">{{ $user->followers()->get()->count() }}</span></small>--}}
                                        {{--</p>--}}


                                    </li>
                                @endforeach
                                {{ $users->links() }}
                            </div>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">

    </script>
@stop