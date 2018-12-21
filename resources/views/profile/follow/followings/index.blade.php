@if($followings_title)
    <div class="card">
        <div class="card-header">
            {{ $followings_title }}
        </div>

        <div class="card-body">
            @include('follows._followings_profile', $followings)
        </div>
    </div>
@endif