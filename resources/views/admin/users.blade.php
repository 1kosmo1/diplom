@extends('layouts.admin')

@section('title','Пользователи')

@section('content')
    <div class="users">
        <table class="users-table">
            <tr>
                <th>Логин</th>
                <th>Пароль</th>
                <th>Галлерея</th>
                <th>Комментарии</th>
            </tr>
            <tr>
                <td>User</td>
                <td>User password</td>
                <td><a href="#">Перейти</a></td>
                <td><a href="#">Просмотреть</a></td>
            </tr>
            <tr>
                <td>User</td>
                <td>User password</td>
                <td><a href="#">Перейти</a></td>
                <td><a href="#">Просмотреть</a></td>
            </tr>
            <tr>
                <td>User</td>
                <td>User password</td>
                <td><a href="#">Перейти</a></td>
                <td><a href="#">Просмотреть</a></td>
            </tr>
        </table>
    </div>
@endsection
