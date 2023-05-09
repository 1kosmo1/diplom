@extends('layouts.admin')

@section('title','Модерация')

@section('content')
    <div class="moderation">
        @foreach($photos as $photo)
            <div class="photo">
                <div class="photo-up">
                    <img src="{{asset('images/' . $photo->image)}}" alt="{{$photo->image}}">
                </div>
                <div class="photo-down">
                    <p>Фото пользователя</p>
                    <div class="moderation-btns">
                        <button class="agree-btn">
                            <i class="fa-solid fa-check"></i>
                        </button>
                        <button class="disagree-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
