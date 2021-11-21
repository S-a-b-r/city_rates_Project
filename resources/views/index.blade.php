@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" justify-content-center">
            <div class="card">
                <div class="card-header">
                    Did you from {{$city}}?
                </div>
                <div class="card-body">
                    <a href="{{route('city.confirm', $city)}}" class="btn btn-primary ">Yes</a>
                    <a href="{{route('city.index')}}" class="btn btn-primary mx-5">No</a>
                </div>
            </div>
        </div>
    </div>
@endsection
