<div style="margin: 0 -1rem 0 -.50rem">
    <nav class="nav flex-column nav-pills">
        <li class="clearfix mb-2">
            <a class="btn btn-sm btn-light float-left w-75 text-left border-light" href="{{ route('profile.show',  auth()->user()) }}">Моя Страница </a>
            <a class="float-right btn btn-sm btn-light w-25 border-light" href="{{ route('profile.edit') }}">ред</a>
        </li>
        <li class="mb-2"><a class="btn btn-sm btn-light text-left w-100 border-light" href="{{ route('profile.feed') }}">Мне Интересно</a></li>
    </nav>
</div>