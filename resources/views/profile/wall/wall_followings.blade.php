<div class="infinite-scroll">
    <div class="my-3">
        @foreach($wall_messages as $message)
            <div class="card my-3">
                <div class="card-header">
                    {{ $message->title  }}

                    <form method="POST" action="{{ route('profile.wall.messages.destroy', $message) }}" class="mr-l float-right">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <div class="float-right mr-2 pt-1">ID:{{ $message->user_id  }}</div>
                </div>

                <div class="card-body">
                    <p>
                        {{ $message->description }}
                    </p>
                </div>
                <div class="card-footer">
                    <span class="float-left">
                        <a href="{{ route('profile.show', $message->user->id) }}">
                        @if ($message->user->first_name && $message->user->last_name)
                            {{ $message->user->first_name }} {{ $message->user->last_name }}
                        @else
                            {{ $message->user->name }}
                        @endif
                        </a>
                    </span>
                    <span class="float-right">{{ $message->created_at }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="my-4">
        {{ $wall_messages->links() }}
    </div>
</div>
