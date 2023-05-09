@extends('layouts.admin')

@section('title','Изменение поста')

@section('content')
    <div class="create">
        <form class="create-form" action="{{route('admin.posts.update',$post->id)}}" method="post">
            @csrf
            @method('put')
            <h3 style="margin-bottom: 30px">Изменение поста</h3>
            <div class="form-group">
                <label for="" >Название достопримечательности</label>
                <input type="text" name="title" placeholder="Заголовок" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="">Картинки</label>
                <input type="file" name="images[]" multiple="{{asset('images/caption.jpeg')}}" readonly>
            </div>
            <div class="form-group">
                <label for="">Местонахождение</label>
                <select name="region_id">
                    @foreach($regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Описание достопримечательности</label>
                <textarea name="text" id="" cols="30" rows="10" placeholder="Описание">{{$post->text}}</textarea>
            </div>
            <div class="form-btns">
                <input type="submit" value="Изменить" class="edit-btn">
                <a href="{{route('admin.posts.index')}}" class="back-btn">Назад</a>
            </div>
        </form>
    </div>
@endsection
