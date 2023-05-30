<header class="header">
    <div class="container">
        <a href="{{route('home')}}" class="logo">ZaKirov</a>
        <nav class="flex g20">
            @if(auth()->check())
                <a href="{{route('profile')}}" class="link">Личный кабинет</a>
                <a href="{{route('cart')}}" class="link">Корзина</a>
            @endif
            <a href="{{route('catalog')}}" class="link">Каталог товаров</a>
            @if(auth()->check())
                @if(auth()->user()->role_id === 2)
                    <a href="{{route('admin')}}" class="link">Админ панель</a>
                @endif
            @endif
        </nav>
        <div class="flex g5">
            @if(!auth()->check())
                <a href="{{route('login')}}" class="btn reversed">Войти</a>
                <a href="{{route('register')}}" class="btn">Зарегистрироваться</a>
            @endif
            @if(auth()->check())
                <a href="{{route('logout')}}" class="btn new">Выйти</a>
            @endif
        </div>
    </div>
</header>
