@if($followers)
    <div class="card @if($followings) my-3 @else mb-3 @endif">
        <div class="card-header">
            {{ $followers_title }}
        </div>

        <div class="card-body">
            @include('follows._followers_user', $followers)
        </div>
    </div>
@endif