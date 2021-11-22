@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div>
                Select your city
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название города</th>
                    <th scope="col">Средний рейтинг города</th>
                    <th scope="col" class="text-lg-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <th scope="row">{{$city->id}}</th>
                        <td>{{$city->name}}</td>
                        <td>{{$city->rate}}</td>
                        <td class="text-lg-center"><a href="{{route('rates.city.show', $city->id)}}" >Просмотреть отзывы</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
