<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Страница входа</title>
</head>
<body>
@include('shared.notification')
<main class="auth main">
    <div class="container">
        <form action="{{route('login')}}" class="form card vertical g20" method="post">
            @csrf
            <h3>Вход</h3>
            <div class="vertical g0">
                <div class="hint">Почта</div>
                <input type="email" class="input" name="email">
            </div>
            <div class="vertical g0">
                <div class="hint">Пароль</div>
                <input type="password" class="input" name="password">
            </div>
            <button class="btn">Войти</button>
            <a href="{{route('home')}}" class="link center">На главную</a>
        </form>
    </div>
</main>
</body>
</html>
