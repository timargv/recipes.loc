@extends('layouts.app')

@section('content')
    <div class="ml-3">
        <div class="card">
            <div class="card-header">
                {{ $title }}
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
@endsection
