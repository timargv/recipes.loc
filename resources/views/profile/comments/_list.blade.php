<div class="infinite-scroll">
@foreach($comments as $comment)
<div id="{{ $comment->id }}" class="my-1 small card-subtitle text-muted pt-2 pb-3">
    <div class="d-flex bd-highlight">
        <div class="align-self-top">
            <a href="{{ route('profile.show', $comment->user->id) }}">
            <img class="rounded-circle" src="https://via.placeholder.com/50/DDDDDD/FFFFFF/" alt="Card image">
            </a>
            <div class="text-center">
                ID: {{ $comment->id }}
            </div>
        </div>
        <div class="align-self-center bd-highlight flex-grow-1">

            <div class="px-3 py-2 card-subtitle text-muted text-dark d-block" style="font-size: 16px">
                <div class="d-flex bd-highlight">
                    <div class="align-self-center mr-auto">
                        <strong class="card-subtitle">
                            <a class="text-muted text-dark" href="{{ route('profile.show', $comment->user->id) }}">
                                @if ($comment->user->first_name && $comment->user->last_name)
                                    {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                @else
                                    {{ $comment->user->name }}
                                @endif
                            </a>
                        </strong>

                        @if($comment->reply_id)
                            <i class="fa fa-long-arrow-right font-weight-light text-muted px-1" style="color: #ddd !important;"></i>
                            @foreach($comment->replies as $comment)
                                <a class="small text-muted text-dark" href="{{ route('profile.show', $comment->user->id) }}">
                                    @if ($comment->user->first_name && $comment->user->last_name)
                                        {{ $comment->user->first_name }}
                                    @else
                                        {{ $comment->user->name }}
                                    @endif
                                </a>
                                COMM: {{ $comment->id }}
                            @endforeach
                        @endif
                    </div>
                    <div class="comment-header-tools align-self-center text-muted text-black-50">
                        <i class="btn btn-sm px-0 bg-transparent fa fa-pencil text-light text-muted mr-2"></i>
                        <i class="btn btn-sm px-0 bg-transparent fa fa-close text-light text-muted"></i>
                    </div>
                </div>
                <div class="small text-black-50 text-muted mb-2">{{ $comment->created_at->diffForHumans() }}</div>
                <p class="card-text mb-2">
                    {{--ID: {{ $comment->id }}--}}
                    {{--Wall-MID: {{ $comment->wall_message_id }}--}}

                    {{ $comment->body }}
                    {{--Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.--}}
                </p>
                <div class="comment-footer-tools">
                    <a href="#replay" id="{{ $comment->id }}" class="replay"
                       title="@if ($comment->user->first_name && $comment->user->last_name)
                       {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                       @else
                       {{ $comment->user->name }}
                       @endif" comment-id="{{ $comment->id }}">{{ __('comments.Replay') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="pl-5 ml-3">--}}
        {{--@include('profile.wall._comment_add_form', $comments)--}}
    {{--</div>--}}



</div>
@endforeach
<div class="d-none">
    {{ $comments->links() }}
</div>
</div>
