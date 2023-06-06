@extends('layouts.admin')

@section('title','Модерация')

@section('content')
    <div class="moderation">
        @if(count($photos) == 0)
            <h3 class="nothing">Фотографий для модерации нету</h3>
        @else
        @foreach($photos as $photo)
            <div class="photo">
                <div class="photo-up">
                    <img src="{{asset('/storage/' . $photo->image)}}" alt="{{$photo->image}}">
                </div>
                <div class="photo-down">
                    <div class="photo-info">
                        <p>Фото пользователя <span>{{$photo->user->login}}</span></p><br>
                        <p>Статус:
                            @if($photo->status === 'allow')
                                <span>
                                Разрешено
                            </span>
                            @elseif($photo->status === 'not allow')
                                <span>
                                Не разрешено
                            </span>
                            @else
                                <span>
                            Ожидание
                        </span>
                            @endif
                        </p>
                    </div>

                    <div class="moderation-btns">
                        <form method="post" action="{{route('admin.allow',$photo)}}">
                            @csrf
                            <button type="submit" class="agree-btn">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                        <form method="post" action="{{route('admin.notAllow',$photo)}}">
                            @csrf
                            <button type="submit" class="disagree-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
@endsection
