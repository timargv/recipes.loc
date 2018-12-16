@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}

                        <a class="float-right" href="{{ route('profile.edit') }}"><i class="fa fa-edit" aria-hidden="true">edit</i></a>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li><b>Ник:</b> {{ $user->name }}</li>
                        </ul>
                        <ul>
                            <li><b>Имя:</b> {{ $user->first_name }}</li>
                            <li><b>Фамилия: {{ $user->last_name }}</b></li>
                        </ul>
                        <ul>
                            <li><b>E-mail:</b> {{ $user->email }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
