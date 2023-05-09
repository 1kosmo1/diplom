@extends('layouts.admin')

@section('title','Изменение региона')

@section('content')
        <div class="create">
            <form class="create-form" action="{{route('admin.regions.store')}}" method="post">
                @csrf
                <h3 style="margin-bottom: 30px">Создание региона</h3>
                <div class="form-group">
                    <label for="" >Название региона</label>
                    <input type="text" name="name" placeholder="Название">
                </div>
                <div class="form-btns">
                    <input type="submit" value="Создать" class="create-btn">
                    <a href="{{route('admin.regions.index')}}" class="back-btn">Назад</a>
                </div>
            </form>
        </div>
@endsection
