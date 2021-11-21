@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <form method="post" action="{{route('rate.store', $city->id)}}" enctype="multipart/form-data">
                @csrf

                <h3>Создание отзыва для города {{$city->name}}</h3>
                <div>
                    <label for="inputPassword5" class="form-label">Введите заглавие отзыва</label>
                    <input id="title" name="title" class="form-control col-5" value="{{old('title')}}">
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3 ">
                        <label for="exampleFormControlTextarea1" class="form-label" >Введите текст отзыва</label>
                        <textarea name="text" class="form-control col-5" id="exampleFormControlTextarea1" rows="3">{{old('text')}}</textarea>
                        @error('text')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="sel1">Выберите оценку городу</label>
                    <select name='rate' class="form-select col-1 mb-3" id="sel1" aria-label="Default select example">
                        <option value="5" selected>5</option>
                        <option value="4" {{(old('rate')==4)?'selected':" "}}>4</option>
                        <option value="3" {{(old('rate')==3)?'selected':" "}}>3</option>
                        <option value="2" {{(old('rate')==2)?'selected':" "}}>2</option>
                        <option value="1" {{(old('rate')==1)?'selected':" "}}>1</option>
                    </select>
                </div>


                <div class="input-group p-0 col-5">
                    <label for="inputGroupFile02">Загрузите изображение для отзыва</label>
                    <div class="input-group mb-3">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    @error('img')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-dark">Создать отзыв</button>
            </form>
        </div>
    </div>
@endsection
