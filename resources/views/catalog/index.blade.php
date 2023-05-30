<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Каталог товаров</title>
</head>
<body>
@include('shared.header')
@include('shared.notification')
<main class="main">
    <div class="container">
        <h2>Все товары</h2>
        <div class="grid f1f3">
            <div class="vertical g20">
                <form action="{{route('catalog')}}" class="card vertical g20">
                    <h3 class="mb20">Фильтрация</h3>

                    <div class="vertical g0">
                        <span class="hint">Поиск</span>
                        <input type="search" class="input" name="name">
                    </div>

                    <div class="vertical g0">
                        <span class="hint">Цена</span>
                        <div class="double">
                            <input type="number" class="input" name="priceFrom" placeholder="От...">
                            <input type="number" class="input" name="priceTo" placeholder="До...">
                        </div>
                    </div>

                    <div class="vertical g0">
                        <span class="hint">Категория</span>
                        <select type="text" class="input" name="category_id">
                            <option value="all">Все категории</option>
                        @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="vertical g0">
                        <span class="hint">Сортировка по цене:</span>
                        <label class="flex g5">
                            <input type="radio" name="sort" value="up">
                            <span>Возрастание</span>
                        </label>
                        <label class="flex g5">
                            <input type="radio" name="sort" value="down">
                            <span>Убывание</span>
                        </label>
                    </div>

                    <button class="btn mt20" type="submit">Отфильтровать</button>
                </form>
            </div>
            <div class="right-panel">
                <div class="grid f3">
                    @foreach($products as $product)
                        <div class="product vertical">
                            <div class="image">
                                <img src="{{$product->image}}" alt="product">
                            </div>
                            <div class="content">
                                <h4>{{$product->name}}</h4>
                                <h3 class="price">{{$product->price}} ₽</h3>
                                <a href="{{route('product.show', $product->id)}}" class="btn f">Подробнее</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</main>
</body>
</html>
