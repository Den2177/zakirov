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
                <h3>Таблица заказов</h3>
                <div class="card table-wrapper">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Общая сумма заказа</th>
                            <th>Дата заказа</th>
                            <th>Товары: </th>
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->full_price}} ₽</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="{{route('order.products.index', $order->id)}}" class="link table-link">Открыть</a>
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
