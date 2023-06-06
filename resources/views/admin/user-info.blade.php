@extends('layouts.admin')

@section('title','Информация о пользователе')

@section('content')
    <div class="edit">
        <form method="post" class="edit-form" action="{{route('admin.users.update',$user->id)}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="login">Логин</label>
                <input name="login" placeholder="Логин" id="login" type="text" value="{{$user->login}}">
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input name="email" placeholder="Почта" id="email" type="text" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="created_at">Зарегистрирован</label>
                <input id="created_at" type="text" value="{{$user->created_at}}" disabled>
            </div>
            <button class="edit-btn" type="submit">Изменить</button>
            <a class="back-btn" href="{{route('admin.users.index')}}">Назад</a>
        </form>
    </div>
    <div class="user-gallery">
        <h2>Фотогалерея пользователя</h2>
        <div class="gallery">
            @if(count($user->photos) == 0)
                <p>Пользователь не добавлял фотографий</p>
            @else
                @foreach($user->photos as $photo)
                    <div class="photo">
                        <img src="{{asset('/storage/' . $photo->image)}}" alt="{{$photo->image}}">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="user-comments">
        <h2>Комментарии пользователя</h2>
        <div class="comments">
            @if(count($user->comments) == 0)
                <p>Пользователь не писал комментарии</p>
            @else
                @foreach($user->comments as $comment)

                @endforeach
            @endif
        </div>
    </div>
@endsection
