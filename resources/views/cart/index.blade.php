<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Страница корзины</title>
</head>
<body>
@include('shared.header')
@include('shared.notification')
<main class="main">
    <div class="container">
        <h2>Корзина товаров</h2>
        <div class="grid f1f3">
            <div class="vertical g20">
                <div class="card">
                    <h3>Сделать заказ</h3>
                    <a href="{{route('order.store')}}" class="btn f mt20">Купить</a>
                </div>
            </div>
            <div class="vertical g20">
                @foreach($cartItems as $item)
                    <div class="cart-product">
                        <div class="image">
                            <img src="{{$item->product->image}}" alt="image">
                        </div>
                        <div class="content">
                            <div class="flex sb">
                                <h3>{{$item->product->name}}</h3>
                                <h3>{{$item->product->price}} ₽</h3>
                            </div>
                            <a href="{{route('cart.destroy', $item->id)}}" class="btn f red mt20">Удалить</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
</body>
</html>
