@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="card text-center">
                <div class="card-header">
                    {{$rate->title}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">{{$rate->text}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
    </div>
@endsection
