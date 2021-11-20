@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <form method="post" action="{{route('rate.store', $city->id)}}" enctype="multipart/form-data">
                @csrf

                <h3>Создание отзыва для города {{$city->name}}</h3>
                <div>
                    <label for="inputPassword5" class="form-label">Введите заглавие отзыва</label>
                    <input id="title" name="title" class="form-control col-5">
                    <div class="mb-3 ">
                        <label for="exampleFormControlTextarea1" class="form-label" >Введите текст отзыва</label>
                        <textarea name="text" class="form-control col-5" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div>
                    <label for="sel1">Выберите оценку городу</label>
                    <select name='rate' class="form-select col-1 mb-3" id="sel1" aria-label="Default select example">
                        <option value="5" selected>5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>


                <div class="input-group p-0 col-5">
                    <label for="inputGroupFile02">Загрузите изображение для отзыва</label>
                    <div class="input-group mb-3">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark">Создать отзыв</button>
            </form>
        </div>
    </div>
@endsection
