@extends('layouts.index')

@section('title','Страница поста')

@section('content')
    <div class="show-post">
        <div class="slider-wrapper">
            <div class="slider">
                @foreach($post->photos()->get() as $photo)
                    <div class="item">
                        <img src="{{asset('/storage/' . $photo->image)}}">
                    </div>
                @endforeach
                <a class="previous" onclick="previousSlide()">&#10094;</a>
                <a class="next" onclick="nextSlide()">&#10095;</a>
            </div>
        </div>
        <div class="show-post-info">
            <div class="info-title">
                <p class="title-text">{{$post->title}}</p>
            </div>
            <div class="info-region">
                <p>Район: </p>
                <p class="region-text"> {{$post->region->name}}</p>
            </div>
            <div class="info-description">
                <p></p>
                <p class="description-text">{{$post->text}}</p>
            </div>
        </div>
    </div>
    <div id="map"></div>


    <div class="post-comments">
        <h2>Отзывы</h2>
        <div class="add-comment">
            <form method="post" action="{{route('public.addComment')}}">
                @csrf
                <input name="post_id" type="hidden" value="{{$post->id}}">
                <textarea name="text" id="" rows="1" placeholder="Напишите отзыв"></textarea>
                <input class="btn comment-btn" type="submit" value="Оставить отзыв">
            </form>
        </div>
        <div class="comments">
            @if(count($post->comments) != 0)
                @foreach($post->comments as $comment)
                    <div>
                        <p>Автор: {{$comment->user->login}}</p>
                        <p>{{$comment->text}}</p>
                    </div>

                @endforeach
            @endif
        </div>
    </div>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8MWEgigtOtH2hXUXHDDegEA6lr9ofD1g&callback=initMap&libraries=places&v=weekly"
        defer
    ></script>
    <script src="http://www.jacklmoore.com/js/autosize.min.js"></script>
    <script>
        autosize($('textarea'));

        function initMap(){
            var uluru = {
                lat:{{$post->dol}},
                lng: {{$post->shir}},
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom:17,
                center:uluru,
            });

            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
            })
        }

        let slideIndex = 1;

        showSlides(slideIndex);

        function nextSlide() {
            showSlides(slideIndex += 1);
        }

        function previousSlide() {
            showSlides(slideIndex -= 1);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {

            let slides = document.getElementsByClassName("item");

            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }

            for (let slide of slides) {
                slide.style.display = "none";
            }

            slides[slideIndex - 1].style.display = "block";
        }
    </script>
@endsection


