@extends('layouts.admin')

@section('title','Галерея')

@section('content')
    <div class="gallery">
        @if(count($photos) == 0)
            <h3 class="nothing">Фотографий пока нет</h3>
        @else
        @foreach($photos as $photo)
            <div class="photo">
                <div class="photo-up">
                    <img src="{{asset('storage/' . $photo->image)}}" alt="{{$photo->image}}">
                </div>
                <div class="photo-down">
                    @if($photo->user_id === null)
                        <p>Фото от сайта</p>
                    @else
                        <p>Фото от пользователя</p>
                    @endif
                </div>
            </div>
        @endforeach
        @endif
    </div>
@endsection
