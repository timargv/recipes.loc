<div id="perlay" class="px-2">
    <div class="col-12">
        <form method="POST" action="{{ route('profile.wall.messages.comments.store', [auth()->user(), $wall_message->id]) }}" class="d-flex bd-highlight" style="text-decoration: none">
            @csrf
            <input class="replay_id" type="hidden" name="reply_id" value="">
            <div class="align-self-top">
                <img class="rounded-circle" src="https://via.placeholder.com/50/DDDDDD/FFFFFF/" alt="Card image">
            </div>
            <div class="align-self-center bd-highlight flex-grow-1">
                <span class="pl-3 py-2 card-subtitle text-muted text-dark d-block">
                    <textarea class="addComment" placeholder="{{ __('comments.Comment') }}" name="body" style="height: 50px;padding: 4px 10px;"></textarea>
                </span>
                <div class="pl-3 card-subtitle text-muted text-dark d-block">
                    <div class="d-flex bd-highlight">
                        <span class="align-self-center">
                            <a class="replay_user_name" href=""></a>
                            <i id="replay_user_name_id" class="" style="cursor: pointer"></i>
                        </span>
                        <button class="d-none d-md-block btn btn-sm p-1 text-center btn-primary ml-auto align-self-center">
                            <i class="fa fa-send-o mr-1"></i> {{ __('comments.Post') }}
                        </button>
                        <button class="d-block d-md-none btn p-1 text-center btn-primary ml-auto align-self-center">
                            <i class="fa fa-send-o mr-1"></i> {{ __('comments.Post') }}
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>
