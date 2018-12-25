<div class="my-1 small card-subtitle text-muted pt-2">
    <form method="POST" action="{{ route('profile.wall.messages.comments.store', [auth()->user(), $wall_message->id]) }}" class="d-flex bd-highlight" style="text-decoration: none">
        @csrf
        <div class="align-self-top">
            <img class="rounded-circle" src="{{ $wall_message->user->getImageThumbnail(auth()->id()) }}" width="30px" height="30px">
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