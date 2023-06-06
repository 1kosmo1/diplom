@extends('layouts.index')

@section('title','Достопримечательности')

@section('content')
    <div class="cards">
        @foreach($posts as $post)
            <div class="card">
                <div class="card-up">
                    <img src="{{asset('/storage/' . $post->photos()->first()->image)}}" alt="">
                </div>
                <div class="card-down">
                    <div class="card-title">
                        <p class="title-text">{{$post->title}}</p>
                    </div>
                    <div class="card-description">
                        <p class="description-text">{{$post->text}}</p>
                    </div>
                </div>
                <a href="{{route('public.show',$post->id)}}" class="card-link"></a>
            </div>
        @endforeach
    </div>
    @if($posts->hasPages())
        {{$posts->onEachSide(2)->links()}}
    @endif
@endsection
