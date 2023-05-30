<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Личный кабинет</title>
</head>
<body>
@include('shared.header')
@include('shared.notification')
<main class="main">
    <div class="container">
        <h2>Личный кабинет</h2>
        <div class="grid f1f3">
            <div class="vertical g20">
                <div class="card">
                    <div class="box-wrapper">

                        <h3 class="center">Закиров Динислам Хайдарович</h3>
                    </div>
                    <div class="vertical g5 center mt20">
                        <h4 class="profile-count">Сделано заказов</h4>
                        <div class="number">{{$ordersCount}}</div>
                    </div>
                </div>
            </div>

            <div class="card card-info vertical g10">
                <div class="flex sb fl-row">
                    <div class="key">ФИО</div>
                    <div class="value">{{$user->name}} {{$user->lastname}} {{$user->patronymic}}</div>
                </div>
                <div class="flex sb fl-row">
                    <div class="key">Почта</div>
                    <div class="value">{{$user->email}}</div>
                </div>
                <div class="flex sb fl-row">
                    <div class="key">Дата рождения</div>
                    <div class="value">{{$user->birthday}}</div>
                </div>
                <div class="flex sb fl-row">
                    <div class="key">Телефон</div>
                    <div class="value">{{$user->phone}}</div>
                </div><div class="flex sb fl-row">
                    <div class="key">Роль</div>
                    <div class="value">{{$user->role->name}}</div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
