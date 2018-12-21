<div class="infinite-scroll">
    <div class="my-3">
        @foreach($wall_messages as $wall_message)
            <div class="card my-3">
                <div class="card-header">
                    {{ $wall_message->title  }}
                    <span class="float-right">ID:{{ $wall_message->user_id  }}</span>
                </div>

                <div class="card-body">
                    <p>
                        {{ $wall_message->description }}
                    </p>
                </div>
                <div class="card-footer">
                    <span class="float-left text-muted mr-2">{{ __('Author') }}:</span>

                    <span class="float-left">
                        <a href="{{ route('profile.show', $wall_message->user->id) }}">
                        @if ($wall_message->user->first_name && $wall_message->user->last_name)
                                {{ $wall_message->user->first_name }} {{ $wall_message->user->last_name }}
                            @else
                                {{ $wall_message->user->name }}
                            @endif
                        </a>
                    </span>
                    <span class="float-right">{{ $wall_message->created_at }}</span>

                </div>
            </div>
        @endforeach
    </div>

    <div class="my-4">
        {{ $wall_messages->links() }}
    </div>
</div>
