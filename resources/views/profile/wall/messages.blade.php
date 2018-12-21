<div class="infinite-scroll">
    <div class="my-0 pl-sm-3 row profile_wall_message ">

        @foreach($wall_messages as $wall_message)
            <div class="col-sm-4 pl-sm-0">
                <div class="card mb-4">
                    <div class="card-header bg-transparent border-0 pl-3 pr-2">
                        <img class="rounded-circle" src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image">
                        <span class="pl-2 font-weight-bold text-muted">
                        @if ($wall_message->user->first_name && $wall_message->user->last_name)
                            {{ $wall_message->user->first_name }} {{ $wall_message->user->last_name }}
                        @else
                            {{ $wall_message->user->name }}
                        @endif
                        </span>

                        <form method="POST" action="{{ route('profile.wall.messages.destroy', $wall_message) }}" class="d-inline float-right">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link bg-transparent text-black-50">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>

                    </div>
                    <img class="card-img-top rounded-0" src="https://via.placeholder.com/293x280/DDDDDD/FFFFFF/?text=Laravel" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">{{ str_limit($wall_message->title, 30)  }}</h5>
                        <p class="card-text profile_wall_message_text">{{ str_limit($wall_message->description, 60) }}
                            <a class="text-black-50 font-weight-bold" href="#">ещё</a>
                        </p>
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

