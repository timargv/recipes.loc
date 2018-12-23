<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
    @else

        <li class="nav-item pl-sm-2 py-2 py-sm-0 "><a class="nav-link py-0" href="{{ route('profile.feed') }}"><i class="fa fa-home fa-fw d-sm-inline"></i> <span class="pl-2 d-inline d-sm-none">Мне Нравится</span> </a></li>
        <li class="nav-item pl-sm-2 py-2 py-sm-0 "><a class="nav-link py-0" href="{{ route('profile.wall.messages.comments.index') }}"><i class="fa fa-comment-o fa-fw d-sm-inline"></i> <span class="pl-2 d-inline d-sm-none">Мои Комментария</span> </a></li>
        <li class="nav-item pl-sm-2 py-2 py-sm-0 "><a class="nav-link py-0" href="{{ route('profile.show',  auth()->user()) }}"><i class="fa fa-user-o fa-fw d-sm-inline"></i> <span class="pl-2 d-inline d-sm-none">Моя Страница</span> </a></li>

        {{--<li class="nav-item dropdown">--}}
            {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                {{--@if (Auth::user()->first_name){{ Auth::user()->first_name }}@else{{ Auth::user()->name }}@endif <span class="caret"></span>--}}
            {{--</a>--}}

            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                {{--<a class="dropdown-item" href="{{ route('profile.show', auth()->user()) }}">{{ __('Моя страница') }}</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Редактировать') }}</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                   {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                    {{--{{ __('Logout') }}--}}
                {{--</a>--}}

                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                    {{--@csrf--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</li>--}}
    @endguest
</ul>
