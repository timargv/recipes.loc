<div class="bg-white mb-3">
    <nav class="row nav justify-content-center text-center align-bottom" style="font-size: 1.5rem">
        <a class="nav-link col py-2 text-dark " href="{{ route('profile.feed') }}"><i class="fa fa-home fa-fw "></i></a>
        <a class="nav-link col py-2 text-dark " href="{{ route('user.index') }}"><i class="fa fa-search fa-fw "></i></a>
        <a class="nav-link col py-2 text-dark " href="{{ route('profile.wall.messages.create') }}"><i class="fa fa-plus-square-o fa-fw "></i></a>
        <a class="nav-link col py-2 text-dark " href="#"><i class="fa fa-heart-o fa-fw "></i></a>
        <a class="nav-link col py-2 text-dark " href="{{ route('profile.show', auth()->user()) }}"><i class="fa fa-user-o fa-fw "></i></a>
    </nav>


</div>





