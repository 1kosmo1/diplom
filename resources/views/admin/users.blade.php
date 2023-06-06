@extends('layouts.admin')

@section('title','Пользователи')

@section('content')
    <div class="users">
        @if(count($users) == 0)
            <h3 class="nothing">Пользователей пока нет</h3>
        @else
        <table class="users-table">
            <tr>
                <th>Логин</th>
                <th>Почта</th>
                <th>Информация</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->login}}</td>
                <td>{{$user->email}}</td>
                <td><a class="link" href="{{route('admin.users.userInfo',$user->id)}}">Перейти</a></td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
@endsection
