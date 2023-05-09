@extends('layouts.admin')

@section('title','Галерея')

@section('content')
    <div class="gallery">
        @foreach($photos as $photo)
            <div class="photo">
                <div class="photo-up">
                    <img src="{{asset('images/' . $photo->image)}}" alt="{{$photo->image}}">
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
    </div>
@endsection
