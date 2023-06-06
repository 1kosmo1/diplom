@extends('layouts.index')

@section('title','Профиль')

@section('content')
    <div class="user-profile">
        <div class="user-info">
            <div class="title-block">
                <h2>Ваша информация</h2>
            </div>
            <div class="login-block">
                <h3>Ваш логин: <span>{{auth()->user()->login}}</span></h3>
            </div>
            <div class="email-block">
                <h3>Ваша почта: <span>{{auth()->user()->email}}</span></h3>
            </div>
            <div class=" edit-password-block">
                <button class="btn edit-password-btn">Изменить пароль</button>
            </div>
            <div class="add-photo">
                <form action="{{route('public.addImage')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <label for="">Добавление фотографии</label>
                    <label class="input-file">
                        <input type="file" name="image">
                        <span class="input-file-btn">Выберите фотографию</span>
                    </label>
                    <button class="btn add-photo-btn" type="submit">Добавить</button>
                </form>
            </div>
            <div class="logout-block">
                <form action="{{route('public.logout')}}" method="post">
                    @csrf
                    <button class="btn logout-btn">Выйти</button>
                </form>
            </div>
        </div>
        <div class="user-gallery">
            @if(count($userPhotos) == 0)
                <h3>Вы не добавили фотографии</h3>
            @else
            @foreach($userPhotos as $photo)
                <div class="photo">
                    <img src="http://u148973.test-handyhost.ru/storage/app/public/{{$photo->image}}" alt="">
                </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
