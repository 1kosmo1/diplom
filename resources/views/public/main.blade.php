@extends('layouts.index')

@section('title','Главная')

@section('content')
    <div class="main-page">
        <p class="site-name">Достопримечательности Витебской области</p>
        <div class="slider-wrapper">
            <div class="slider">
                @foreach($photos as $photo)
                <div class="item">
                    <img src="{{asset('/storage/' . $photo->image)}}">
                </div>
                @endforeach

                <a class="previous" onclick="previousSlide()">&#10094;</a>
                <a class="next" onclick="nextSlide()">&#10095;</a>
            </div>
        </div>
    </div>
    <script>

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
