@extends('layouts.index')

@section('title','Фотогалерея')

@section('content')
    <div class="public-gallery">
        @foreach($photos as $photo)
            <div class="photo">
                <img src="{{asset('/storage/' . $photo->image)}}" alt="">
                <div class="photo-info">
                    <p class="created-at">Дата создания: {{$photo->created_at}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
