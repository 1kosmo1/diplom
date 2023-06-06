@extends('layouts.admin')

@section('title','Посты')

@section('content')
        <div class="content-menu">
            <div class="menu">
                <a href="{{route('admin.posts.create')}}" class="create-btn">Создать</a>
                <form action="" method="post" class="search-form">
                    @csrf
                    <input type="search" placeholder="Поиск" class="search-input">
                    <input type="submit" value="Найти" class="search-btn">
                </form>
            </div>
        </div>
        <div class="content-inner">
            @if(count($posts) == 0)
                <h3 class="nothing">Посты пока не добавлены</h3>
            @else
            @foreach($posts as $post)
                <div class="post">
                        <a class="post-image" style="display: block" href="{{route('admin.posts.show',$post->id)}}">
                            <img src="{{asset('/storage/' . $post->photos()->first()->image)}}" alt="">
                        </a>
                    <div class="title-content">
                        <form method="post" action="{{route('admin.posts.destroy',$post->id)}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <button type="submit"><i class="fa-solid fa-trash fa-lg content-icon"></i></button>
                        </form>
                        <h3 class="title-text">{{$post->title}}</h3>
                        <a href="{{route('admin.posts.edit',$post->id)}}"><i class="fa-solid fa-pen-to-square fa-lg content-icon"></i></a>
                    </div>
                    <p class="post-text">{{$post->text}}</p>
                </div>
            @endforeach
            @endif
        </div>

@endsection
