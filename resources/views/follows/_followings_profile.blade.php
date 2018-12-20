<ul class="nav flex-column">
    @foreach($followings as $key => $following)
        @if($following->first_name == null ||  $following->last_name == null)
            <li class="nav-item"><a class="nav-link" href="{{ route('profile.show', $following) }}">{{ $following->name }}</a></li>
        @else
            <li class="nav-item"><a class="nav-link" href="{{ route('profile.show', $following) }}">{{ $following->first_name }} {{ $following->last_name  }}</a></li>
        @endif
    @endforeach
</ul>
