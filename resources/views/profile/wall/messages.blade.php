<div class="infinite-scroll">
    <div class="my-0 pl-sm-3 row profile_wall_message">

        @foreach($wall_messages as $wall_message)
            <div id="wall{{ $wall_message->id }}" class="col-md-6 col-lg-4 pl-sm-0">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 px-2 py-2">

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
                    <a href="{{ route('profile.wall.messages.show.message', ['user' => $wall_message->user, 'message' => $wall_message]) }}">
                    <img class="card-img-top rounded-0" src="https://via.placeholder.com/293x280/DDDDDD/FFFFFF/?text=Laravel" alt="Card image">
                    </a>

                    <div class="card-body pt-2 pb-2">
                        <div class="mb-1">
                            <nav class="nav d-flex bd-highlight" style="font-size: 1.3rem">
                                @if($wall_message->isLikedBy(auth()->user()))
                                    <button class="align-self-center bd-highlight mr-1 btn bg-transparent p-0 action-like" data-id="{{ $wall_message->id }}"><i id="favIcon-{{ $wall_message->id }}" class="float-left fa fa-heart text-danger"></i></button>
                                @else
                                    <button class="align-self-center bd-highlight mr-1 btn bg-transparent p-0 text-muted action-like" data-id="{{ $wall_message->id }}"><i id="favIcon-{{ $wall_message->id }}" class="float-left fa fa-heart-o text-black-50"></i></button>
                                @endif

                                <a class="align-self-center bd-highlight mr-1" href="{{ route('profile.wall.messages.show.message', ['user' => $wall_message->user, 'message' => $wall_message]) }}"><i class="fa fa-comment-o text-black-50"></i></a>
                                <span class="align-self-center bd-highlight text-muted small text-black-50">{{ $wall_message->getCommentsCount() }}</span>
                                {{--<a class="mr-2" href="#"><i class="fa fa-share text-dark"></i></a>--}}
                                <a class="align-self-center bd-highlight ml-auto" href="#"><i class="fa fa-bookmark-o text-black-50"></i></a>
                            </nav>
                        </div>
                        <div class="small card-subtitle text-muted font-weight-bold mb-1">{{ __('walls.Likes') }}: <span class="count-like-{{ $wall_message->id }}">{{ $wall_message->fans()->count() }}</span></div>
                        <p class="card-text profile_wall_message_text mb-2">
                            <span class="card-subtitle font-weight-bold">{{ str_limit($wall_message->title, 30)  }}</span>
                            {{ str_limit($wall_message->description, 60) }}
                            <a class="text-black-50 font-weight-bold" href="#">ещё</a>
                        </p>

                        <div class="my-1 small card-subtitle text-muted pt-2">
                            <form method="POST" action="{{ route('profile.wall.messages.comments.store', [auth()->user(), $wall_message->id]) }}" class="d-flex bd-highlight" style="text-decoration: none">
                                @csrf
                                <div class="align-self-top">
                                    <img class="rounded-circle" src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image">
                                </div>
                                <div class="align-self-center bd-highlight flex-grow-1">
                                    <span class="px-2 py-2 card-subtitle text-muted text-dark d-block">
                                        <textarea class="addComment" placeholder="{{ __('comments.Comment') }}" name="body"></textarea>
                                    </span>
                                </div>
                                <div class="align-self-top">
                                    <button class="btn btn-sm p-1 text-center rounded-circle btn-primary " style="width: 28px; margin-top: 2px;">
                                        <i class="fa fa-send-o"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <p class="card-text"><small class="text-muted">{{ $wall_message->created_at->diffForHumans()}}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="my-4 d-none">
        {{ $wall_messages->links() }}
    </div>
</div>

