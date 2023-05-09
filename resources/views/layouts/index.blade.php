<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/public.css','resources/js/app.js'])
    <title>@section('title')</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <img src="{{asset('images/Coat_of_Arms_of_Vitsebsk_Voblasts.svg')}}" alt="logo">
                </div>
                <div class="header-menu">
                    <menu>
                        <li>
                            <form action="" method="get" class="search-form">
                                @csrf
                                <input type="search" placeholder="Поиск">
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
                    </menu>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <div class="content-menu">

            </div>
            @yield('content')
        </div>
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
</html>
