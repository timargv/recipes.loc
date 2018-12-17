@foreach($users as $user)
    <li class="list-group-item">{{ $user->id }} - {{ $user->name }}</li>
@endforeach