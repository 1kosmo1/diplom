<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @vite(['resources/css/public.css','resources/js/app.js'])
    <title>@section('title')</title>
</head>
<body>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <img src="{{asset('images/Coat_of_Arms_of_Vitsebsk_Voblasts.svg')}}" alt="logo">
                </div>
                <div class="header-menu">
                    <menu>
                        <li>
                            <form action="{{route('public.posts')}}" method="get" class="search-form">
                                @csrf
                                <input name="search" type="search" placeholder="Поиск">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
                            </form>
                        </li>
                        @guest
                            <li>
                                <button class="btn auth-btn">Войти</button>
                            </li>
                            <li>
                                <button class="btn reg-btn">Зарегистрироваться</button>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="{{route('public.profile',auth()->user())}}" class="btn profile-btn">Профиль</a>
                            </li>
                        @endauth
                    </menu>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <div class="content-menu">
                <nav class="menu">
                    <a href="{{route('public.index')}}">Главная</a>
                    <a href="{{route('public.gallery')}}">Фотогалерея</a>
                    <a href="{{route('public.posts')}}">Достопримечательности</a>
                </nav>
                <div class="filters">
                @if(isset($gallery))
                        <form class="date-filter" method="get" action="{{route('public.gallery')}}">
                            @csrf
                            <button class="btn" type="submit">
                                <i class="fa-solid fa-arrow-up fa-xl" style="color: #4C495D"></i>
                                <i class="fa-solid fa-arrow-down fa-xl" style="color: #4C495D;display: none"></i>
                                По дате
                            </button>
                        </form>
                @elseif(isset($postsUrl))
                        <form class="alfavit" method="get" action="{{route('public.posts')}}">
                            @csrf
                            <button type="submit" class="btn asc">А-Я</button>
                            <button type="submit" class="btn desc" style="display: none">Я-А</button>
                        </form>
                        <form method="get" action="{{route('public.posts')}}">
                            @csrf
                            <select class="filter" name="filter" id="">
                                @foreach($regions as $region)
                                    <option
                                        value="{{$region->id}}"
                                        @if(isset($filterId))
                                            @if($filterId == $region->id)
                                                selected
                                        @endif
                                        @endif
                                    >
                                        {{$region->name}}</option>
                                @endforeach
                            </select>
                        </form>
                @endif
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class=footer-menu>
                    <p class="footer-menu-title-text">Навигация</p>
                    <nav class="menu">
                        <a href="{{route('public.index')}}">Главная</a>
                        <a href="{{route('public.gallery')}}">Фотогалерея</a>
                        <a href="{{route('public.posts')}}">Достопримечательности</a>
                    </nav>
                </div>
                <div class="license">
                    <p class="license-text">Сайт разработал Денчик</p>
                </div>
            </div>
        </div>
    </footer>
</div>

    <div class="modal modal-auth">
        <div class="modal-content">
            <div class="modal-title">
                <h2>Авторизация</h2>
                <i class="fa-solid fa-square-xmark fa-xl close-modal-btn"></i>
            </div>
            <form class="modal-form" action="{{route('public.login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label style="{{$errors->has('loginA') ? 'color:red' : ''}}" for="loginA">Логин</label>
                    <input style="{{$errors->has('loginA') ? 'border:3px solid red' : ''}}" name="login" type="text">
                </div>
                <div class="form-group">
                    <label for="passwordA">Пароль</label>
                    <input style="{{$errors->has('passwordA') ? 'border:3px solid red' : ''}}" name="password" type="password" required>
                </div>
                <input class="btn auth-btn" type="submit" value="Войти">
            </form>
        </div>
    </div>
    <div class="modal modal-reg" style="
    @if($errors->has('login'))
        display:block
    @elseif($errors->has('login'))
        display:block
    @endif">
        <div class="modal-content">
            <div class="modal-title">
                <h2>Регистрация</h2>
                <i class="fa-solid fa-square-xmark fa-xl close-modal-btn"></i>
            </div>
            <form class="modal-form" action="{{route('public.register')}}" method="post">
                @csrf
                <div class="form-group">
                    <label style="{{$errors->has('login') ? 'color:red' : ''}}" for="login">Логин</label>
                    <input style="{{$errors->has('login') ? 'border: 3px solid red' : ''}}" name="login" type="text" placeholder="Минимум 6 символов">
                </div>
                <div class="form-group">
                    <label style="{{$errors->has('email') ? 'color:red' : ''}}" for="email">Почта</label>
                    <input style="{{$errors->has('email') ? 'border: 3px solid red' : ''}}" name="email" type="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label style="{{$errors->has('password') ? 'color:red' : ''}}" for="password">Пароль</label>
                    <input style="{{$errors->has('password') ? 'border: 3px solid red' : ''}}" name="password" type="password" placeholder="Минимум 8 символов">
                </div>
                <div class="form-group">
                    <label style="{{$errors->has('password') ? 'color:red' : ''}}" for="password_confirmation">Повторите пароль</label>
                    <input style="{{$errors->has('password') ? 'border: 3px solid red' : ''}}" name="password_confirmation" type="password" placeholder="Повторите пароль">
                </div>
                <input class="btn auth-btn" type="submit" value="Зарегистрироваться">
            </form>
        </div>
    </div>
</body>
<script>
    $('.date-filter').on("submit", function (e){
        e.preventDefault()
        if($('.fa-arrow-up').is(':hidden')){
            $.ajax({
                url:"/gallery",
                method: "get",
                dataType: "html",
                data:{
                    'date_filter': 'down',
                },
                success: function (data){
                    $('body').html(data)
                    $('body meta').remove()
                    $('body link').remove()
                    $('body title').remove()
                    $('body script[type="module"]').remove()
                    $('body script[src]').remove()

                    $('.fa-arrow-up').show()
                    $('.fa-arrow-down').hide()
                }
            })
        }
        else{
            $.ajax({
                url:"/gallery",
                method: "get",
                dataType: "html",
                data:{
                    'date_filter': 'up',
                },
                success: function (data){
                    $('body').html(data)
                    $('body meta').remove()
                    $('body link').remove()
                    $('body title').remove()
                    $('body script[type="module"]').remove()
                    $('body script[src]').remove()

                    $('.fa-arrow-up').hide()
                    $('.fa-arrow-down').show()
                }
            })
        }
    })

    $('.alfavit').on('submit', function (e){
        e.preventDefault()
        if($('.desc').is(':hidden')){
            $.ajax({
                url:"/posts",
                method:'get',
                dataType:'html',
                data:{
                    'alfavit': 'a'
                },
                success: function (data){
                    $('body').html(data)
                    $('body meta').remove()
                    $('body link').remove()
                    $('body title').remove()
                    $('body script[type="module"]').remove()
                    $('body script[src]').remove()

                    $('.desc').show()
                    $('.asc').hide()
                }
            })
        }
        else{
            $.ajax({
                url:"/posts",
                method:'get',
                dataType:'html',
                data:{
                    'alfavit': 'z'
                },
                success: function (data){
                    $('body').html(data)
                    $('body meta').remove()
                    $('body link').remove()
                    $('body title').remove()
                    $('body script[type="module"]').remove()
                    $('body script[src]').remove()

                    $('.desc').hide()
                    $('.asc').show()
                }
            })
        }
    })

    $('.filter').on('change',function (){
        $.ajax({
            url:"/posts",
            method:'get',
            dataType:'html',
            data:{
                'filter': $('.filter').val()
            },
            success: function (data){
                $('body').html(data)
                $('body meta').remove()
                $('body link').remove()
                $('body title').remove()
                $('body script[type="module"]').remove()
                $('body script[src]').remove()
            }
        })
    })
</script>
</html>
