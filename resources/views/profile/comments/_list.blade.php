<div class="infinite-scroll">
@foreach($comments as $comment)
<div class="my-1 small card-subtitle text-muted pt-2 pb-2 ">
    <div class="d-flex bd-highlight">
        <div class="align-self-top">
            <a href="{{ route('profile.show', $comment->user->id) }}">
            <img class="rounded-circle" src="https://via.placeholder.com/50/DDDDDD/FFFFFF/" alt="Card image">
            </a>
        </div>
        <div class="align-self-center bd-highlight flex-grow-1">

            <span class="px-3 py-2 card-subtitle text-muted text-dark d-block" style="font-size: 16px">
                <strong class="card-subtitle">
                <a class="text-muted text-dark" href="{{ route('profile.show', $comment->user->id) }}">
                @if ($comment->user->first_name && $comment->user->last_name)
                        {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                    @else
                        {{ $comment->user->name }}
                    @endif
                </a>
                </strong>
                <div class="small text-black-50 text-muted mb-2">{{ $comment->created_at->diffForHumans() }}</div>
                <p class="card-text ">
                    {{--ID: {{ $comment->id }}--}}
                    {{--Wall-MID: {{ $comment->wall_message_id }}--}}

                    {{ $comment->body }}
                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.

                </p>
            </span>
        </div>
    </div>
</div>
@endforeach
<div class="d-none">
    {{ $comments->links() }}
</div>
</div>
