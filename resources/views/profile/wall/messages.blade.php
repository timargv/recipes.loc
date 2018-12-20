<div class="infinite-scroll">
    <div class="my-3">
    @foreach($wall_messages as $message)
        <div class="card my-3">
            <div class="card-header">
                {{ $message->title  }}

                <form method="POST" action="{{ route('profile.wall.messages.destroy', $message) }}" class="mr-l float-right">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>

            <div class="card-body">
                <p>
                    {{ $message->description }}
                </p>
            </div>
        </div>
    @endforeach
    </div>

    <div class="my-4">
        {{ $wall_messages->links() }}
    </div>
</div>
