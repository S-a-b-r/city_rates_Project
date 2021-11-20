@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <h4>Отзывы по городу {{$city->name}}</h4>
            <div>
                @auth()
                    <a href="{{route('rate.create', $city->id)}}"><button class="btn btn-outline-secondary">Добавить отзыв</button></a>
                @endauth
            </div>
            <div class="row">
                @foreach($rates as $rate)
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{asset('storage/' . $rate->img)}}" class="card-img-top mt-2">
                        <div class="card-body">
                            <h5 class="card-title">{{$rate->title}}</h5>
                            <p class="card-text">{{$rate->text}}</p>
                            <p>Rate: {{$rate->rate}}</p>
                            <a href="{{route('rate.show', [$rate->id_city, $rate->id])}}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
