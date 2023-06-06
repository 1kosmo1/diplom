@extends('layouts.admin')

@section('title','Пост')

@section('content')
    <div class="post-show">
        <div class="show-content">
            <div class="show-images">
                <div class="show-image">
                    <img src="{{asset('/storage/' . $post->photos()->first()->image)}}" alt="">
                    <div class="other-images">
                        @foreach($post->photos()->get() as $photo)
                            <img src="{{asset('/storage/' . $photo->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="show-info">
                <p class="info-title">{{$post->title}}</p>
                <p class="info-region"><b>Регион:</b> {{$post->region->name}}</p>
                <p class="info-description"><b>Описание: </b>{{$post->text}}</p>
                <div class="show-btns">
                    <a href="{{route('admin.posts.edit',$post->id)}}" class="edit-btn">Изменить</a>
                    <a href="{{route('admin.posts.destroy',$post->id)}}" class="delete-btn">Удалить</a>
                    <a href="{{route('admin.posts.index')}}" class="back-btn">Назад</a>

                </div>
            </div>
        </div>
    </div>
@endsection
