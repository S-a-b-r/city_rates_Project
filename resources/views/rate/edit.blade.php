@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <form method="post" action="{{route('rate.update', $rate)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <h3>Редактирование отзыва {{$rate->title}}</h3>
                <div>
                    <label for="inputPassword5" class="form-label">Измените заглавие отзыва</label>
                    <input id="title" name="title" value="{{$rate->title}}" class="form-control col-5">
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3 ">
                        <label for="exampleFormControlTextarea1" class="form-label" >Измените текст отзыва</label>
                        <textarea name="text" class="form-control col-5" id="exampleFormControlTextarea1" rows="3">{{$rate->text}}</textarea>
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
                        <option value="5" {{($rate->rate == 5)?"selected":" "}}>5</option>
                        <option value="4" {{($rate->rate == 4)?"selected":" "}}>4</option>
                        <option value="3" {{($rate->rate == 3)?"selected":" "}}>3</option>
                        <option value="2" {{($rate->rate == 2)?"selected":" "}}>2</option>
                        <option value="1" {{($rate->rate == 1)?"selected":" "}}>1</option>
                    </select>
                </div>

                <img src="{{asset('storage/' . $rate->img)}}" class="card-img-top mt-2 w-50">
                <div class="input-group p-0 col-5">
                    <label for="inputGroupFile02">Загрузите изображение если хотите его поменять</label>
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

                <button type="submit" class="btn btn-outline-dark">Изменить отзыв</button>
            </form>
        </div>
    </div>
@endsection
