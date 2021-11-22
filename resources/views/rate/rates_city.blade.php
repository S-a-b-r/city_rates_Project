@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <h4>Отзывы по городу {{$city->name}}</h4>
            <div>
                @auth()
                    <a href="{{route('rates.create', $city->id)}}"><button class="btn btn-outline-secondary">Добавить отзыв</button></a>
                @endauth
            </div>
            <div class="row">
                @if(count($rates) > 0)
                    @foreach($rates as $rate)
                        <div class="card m-3" style="width: 25rem;">

                            <img src="{{asset('storage/' . $rate->img)}}" class="card-img-top mt-2">
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
                    <p>Отзывов еще нет, будьте первым, кто оставит отзыв о вашем городе</p>
                @endif
            </div>

        </div>
    </div>
@endsection
