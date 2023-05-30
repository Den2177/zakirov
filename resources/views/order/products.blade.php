<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Мои заказы</title>
</head>
<body>
@include('shared.header')
@include('shared.notification')

<main class="main">
    <div class="container">
        <div class="orders-body">
            <div class="vertical g20">
                <h3>Таблица товаров заказа</h3>
                <div class="card table-wrapper">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>ID категории</th>
                            <th>Изображение</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->about}}</td>
                                <td>{{$product->price}} ₽</td>
                                <td>{{$product->category_id}}</td>
                                <td>
                                    <a href="{{$product->image}}" target="_blank" class="link table-link">Открыть</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
