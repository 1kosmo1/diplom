@extends('layouts.admin')

@section('title','Изменение региона')

@section('content')
    <div class="edit">
        <form class="edit-form" method="post" action="{{route('admin.regions.update', $region->id)}}">
            @csrf
            @method('put')
            <h3 style="margin-bottom: 30px">Изменение региона</h3>
            <div class="form-group">
                <label for="" >Название региона</label>
                <input type="text" name="name" placeholder="Название" value="{{$region->name}}">
            </div>
            <div class="form-btns">
                <input type="submit" value="Изменить" class="edit-btn">
                <a href="{{route('admin.regions.index')}}" class="back-btn">Назад</a>
            </div>
        </form>
    </div>

@endsection
