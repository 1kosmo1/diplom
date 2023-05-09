@extends('layouts.admin')

@section('title','Регионы')

@section('content')
    <div class="content-menu">
        <div class="menu">
            <a href="{{route('admin.regions.create')}}"  class="create-btn">Создать</a>
            <form action="" method="post" class="search-form">
                @csrf
                <input type="search" placeholder="Поиск" class="search-input">
                <input type="submit" value="Найти" class="search-btn">
            </form>
        </div>
    </div>
    <div class="content-inner">
        @if(count($regions) < 1)
            <h3 class="nothing">Регионы пока не добавлены</h3>
        @else
        <table class="table">
            <tr>
                <th>Регион</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            @foreach($regions as $region)
                <tr>
                    <td>{{$region->name}}</td>
                    <td><a href="{{route('admin.regions.edit',$region->id)}}"><i class="fa-solid fa-pen-to-square fa-lg content-icon"></i></a></td>
                    <td>
                        <form method="post" action="{{route('admin.regions.destroy', $region->id)}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$region->id}}">
                            <button type="submit"><i class="fa-solid fa-trash fa-lg content-icon"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
@endsection
