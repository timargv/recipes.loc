<div class="infinite-scroll">
    <div class="my-0 pl-3 row profile_wall_message ">

        @foreach($wall_messages as $wall_message)
            <div class="col-12 pl-0 mb-2">
                <div class="card mb-4">
                    <div class="card-header bg-transparent border-0 px-3">
                        <a class="link" href="{{ route('profile.show', $wall_message->user->id) }}">
                        <img class="rounded-circle" src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image">
                        <span class="pl-2 font-weight-bold text-muted">

                            @if ($wall_message->user->first_name && $wall_message->user->last_name)
                                {{ $wall_message->user->first_name }} {{ $wall_message->user->last_name }}
                            @else
                                {{ $wall_message->user->name }}
                            @endif
                        </span>
                        </a>

                    </div>
                    <img class="card-img-top rounded-0" src="https://via.placeholder.com/614/DDDDDD/FFFFFF/?text=Laravel" alt="Card image">
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold">{{ str_limit($wall_message->title, 30)  }}</h6>
                        <p class="card-text ">{{ str_limit($wall_message->description, 150) }}
                            @if(strlen($wall_message->description) >= 150)
                            <a class="text-dark font-weight-bold" href="#">ещё</a>
                            @endif
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

