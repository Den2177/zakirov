<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Главная страница</title>
</head>
<body>
@include('shared.header')
@include('shared.notification')
<main class="main">
    <div class="container">
        <div class="grid f1f2">
            <div class="image">
                <img src="{{$product->image}}" alt="image">
            </div>
            <div class="card content">
                <h3 class="show-title">{{$product->name}}</h3>
                <div class="text">
                    {{$product->about}}
                </div>
                <div class="flex g5 mt10">
                    <div class="key">Категория:</div>
                    <div class="value">{{$product->category->name}}</div>
                </div>
                <h2 class="mt5">{{$product->price}} ₽</h2>
                @if(auth()->check())
                    <a href="{{route('cart.add', $product->id)}}" class="btn f">Добавить в корзину</a>
                @endif
            </div>
        </div>
    </div>
</main>
</body>
</html>
