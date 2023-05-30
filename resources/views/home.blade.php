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
        <h2>Новые товары</h2>
        <div class="grid f4">
            @foreach($products as $product)
                <div class="product vertical">
                    <div class="image">
                        <img src="{{$product->image}}" alt="product">
                    </div>
                    <div class="content">
                        <h4>{{$product->name}}</h4>
                        <h3>{{$product->price}} ₽</h3>
                        <a href="{{route('product.show', $product->id)}}" class="btn f">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</main>
</body>
</html>
