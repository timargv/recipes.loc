<ul class="nav flex-column">
    @foreach($followers as $follower)
        @if($follower->first_name == null ||  $follower->last_name == null)
            <li><a href="{{ route('user.show', $follower) }}">{{ $follower->name }}</a></li>
        @else
            <li><a href="{{ route('user.show', $follower) }}">{{ $follower->first_name }} {{ $follower->last_name  }}</a></li>
        @endif
    @endforeach
</ul>
