<div class="my-3">
    @foreach($wall_messages as $message)
        <div class="card my-3">
            <div class="card-header">
                {{ $message->title  }}
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
    {{ $wall_messages->appends(Request::only('title'))->links() }}
</div>