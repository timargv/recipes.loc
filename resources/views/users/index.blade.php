@extends('layouts.app')

@section('title_page')
    @if(old('search'))
        Поиск людей по запросу {{ old('search') }}
    @else
        Поиск людей
    @endif
@endsection

@section('content')
    <div class="ml-3">
        <div class="row">
            <div class="col-8 pr-0">
                <div class="card">
                    <div class="card-header">
                        <span>{{ $title }}</span>
                        <form class="form-inline mr-0 pr-0 float-right col-4">
                            <div class="form-row align-items-center  w-100" action="?" method="GET">
                                <div class=" w-100">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control mb-0 form-control-sm" id="inlineFormInput" placeholder="Найти">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <ul class="list-group list-group-flush">
                            <div class="infinite-scroll">

                                @if(!$users->count())
                                    <div class="text-center my-5 text-muted w-100">
                                        Ваш запрос не дал результатов
                                    </div>
                                @endif

                                @foreach($users as $user)
                                    <li class="list-group-item px-0 ">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="https://pp.userapi.com/c623928/v623928512/35f14/MweWozAQs_U.jpg" class="w-100 rounded-circle float-left" alt="...">
                                            </div>
                                            <div class="col-10 pl-0 pt-2">
                                                <div class="row">
                                                    <div class="col-8 font-weight-bold ">
                                                        <a class="text-dark" href="{{ route('profile.show', $user) }}">
                                                            @if ($user->first_name && $user->last_name)
                                                                {{ $user->first_name }} {{ $user->last_name }}
                                                            @else
                                                                {{ $user->name }}
                                                            @endif
                                                        </a>
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
            <div class="col-4">
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">

    </script>
@stop
