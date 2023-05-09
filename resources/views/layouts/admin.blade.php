<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/css/admin.css','resources/js/app.js'])

    <title>@yield('title','Админ панель')</title>
</head>
<body>
<div class="wrapper">
    <div class="wrapper-inner">
        <div class="sidebar">
            <div class="sidebar-title">
                <i class="fa-solid fa-circle-user fa-3x" style="color: rgb(30, 48, 80); margin-right: 30px"></i>
                <p class="admin-name">Администратор</p>
            </div>
            <div class="sidebar-menu">
                <p class="menu-title">Меню</p>
                <nav class="menu">
                    <a href="{{route('admin.gallery.index')}}" class="menu-item">
                        <i class="fa-solid fa-image fa-2x item-icon" style="color: rgb(30, 48, 80)"></i>
                        <p class="item-text">Фотогалерея</p>
                    </a>
                    <a href="{{route('admin.users.index')}}" class="menu-item">
                        <i class="fa-solid fa-users fa-2x item-icon" style="color: rgb(30, 48, 80)"></i>
                        <p class="item-text">Пользователи</p>
                    </a>
                    <a href="{{route('admin.posts.index')}}" class="menu-item">
                        <i class="fa-solid fa-book fa-2x item-iconfa-2x item-icon" style="color: rgb(30, 48, 80)"></i>
                        <p class="item-text">Посты</p>
                    </a>
                    <a href="{{route('admin.regions.index')}}" class="menu-item">
                        <i class="fa-solid fa-globe fa-2x item-icon" style="color: rgb(30, 48, 80)"></i>
                        <p class="item-text">Регионы</p>
                    </a>
                    <a href="{{route('admin.moderation')}}" class="menu-item">
                        <i class="fa-solid fa-circle-check fa-2x item-icon" style="color: rgb(30, 48, 80)   "></i>
                        <p class="item-text">Модерация</p>
                    </a>
                </nav>
            </div>
        </div>
        <div class="content">
            @yield('content','контент')
        </div>
    </div>

</div>
</body>
</html>
