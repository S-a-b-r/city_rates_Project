@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <h4>Отзывы пользователя {{$user->fio}}</h4>
            <div class="row">
                @if(count($rates) > 0)
                    @foreach($rates as $rate)
                        <div class="card m-3" style="width: 25rem;">
                            <h5 class="mt-2">Город: {{$rate->city->name}}</h5>

                            <img src="{{asset('storage/' . $rate->img)}}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{$rate->title}}</h5>
                                <p class="card-text">{{$rate->text}}</p>
                                <p>Rate: {{$rate->rate}}</p>

                                @auth()
                                <a href="{{route('users.show', $rate->creator)}}" style="color: black;">
                                    <p>Author: {{$rate->creator->fio}}</p>
                                </a>
                                @endauth

                                @guest()
                                    <p>Author: {{$rate->creator->fio}}</p>
                                @endguest

                                @auth
                                    @author($rate->id_author)
                                        <a href="{{route('rates.edit', $rate->id)}}" class="btn btn-primary mb-2">Изменить отзыв</a>

                                        <form method="post" action="{{route('rates.destroy', $rate->id)}}">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    @endauthor
                                @endauth
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Пользователь еще не оставлял отзывов</p>
                @endif
            </div>

        </div>
    </div>
@endsection
