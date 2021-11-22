@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="card text-center">
                <div class="card-header">
                    Контактные данные пользователя #{{$user->id}}
                </div>
                <div class="card-body">
                    <p class="card-text"> FIO: {{$user->fio}}</p>
                    <p class="card-text">Email: {{$user->email}}</p>
                    <p class="card-text">Phone number: {{$user->phone}}</p>
                </div>
                <div class="card-footer"><a href="{{route('rates.user.show', $user)}}">Просмотреть все отзывы пользователя</a></div>
            </div>
        </div>
    </div>
@endsection
