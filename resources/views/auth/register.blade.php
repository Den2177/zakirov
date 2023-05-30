<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Страница регистрации</title>
</head>
<body>
@include('shared.notification')
<main class="auth main">
    <div class="container">
        <form action="{{route('register')}}" class="form card vertical g20" method="post">
            @csrf
            <h3>Авторизация</h3>
            <div class="vertical g0">
                <div class="hint">Имя</div>
                <input type="text" class="input" name="name">
            </div>
            <div class="vertical g0">
                <div class="hint">Фамилия</div>
                <input type="text" class="input" name="lastname">
            </div>
            <div class="vertical g0">
                <div class="hint">Отчество</div>
                <input type="text" class="input" name="patronymic">
            </div>
            <div class="vertical g0">
                <div class="hint">Пароль</div>
                <input type="password" class="input" name="password">
            </div>
            <div class="vertical g0">
                <div class="hint">День рождения</div>
                <input type="date" class="input" name="birthday">
            </div>
            <div class="vertical g0">
                <div class="hint">Телефон</div>
                <input type="text" class="input" name="phone">
            </div>
            <div class="vertical g0">
                <div class="hint">Почта</div>
                <input type="email" class="input" name="email">
            </div>
            <button class="btn">Зарегистрироваться</button>

            <a href="{{route('home')}}" class="link center">На главную</a>

        </form>
    </div>
</main>
</body>
</html>
