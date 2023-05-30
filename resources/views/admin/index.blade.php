<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Страница администратора</title>
</head>
<body>
@include('shared.header')
@include('shared.notification')

<main class="main">
    <div class="container">
        <div class="grid f1f3">
            <div class="vertical g20">
                <form action="{{route('product.store')}}" method="post" class="card vertical g20"
                      enctype="multipart/form-data">
                    @csrf
                    <h4>Добавить продукт</h4>
                    <div class="vertical g0">
                        <div class="hint">Наименование</div>
                        <input type="text" class="input" name="name">
                    </div>
                    <div class="vertical g0">
                        <div class="hint">Описание</div>
                        <textarea type="text" class="input" name="about"></textarea>
                    </div>
                    <div class="vertical g0">
                        <div class="hint">Категория</div>
                        <select type="text" class="input" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="vertical g0">
                        <div class="hint">Цена (в рублях)</div>
                        <input type="number" class="input" name="price">
                    </div>
                    <div class="vertical g0">
                        <div class="hint">Фото</div>
                        <input type="file" class="input" name="image">
                    </div>
                    <button class="btn" type="submit">Создать</button>
                </form>
                <form action="{{route('category.store')}}" class="card vertical g20" method="POST">
                    @csrf
                    <h4>Добавить категорию</h4>
                    <div class="vertical g0">
                        <div class="hint">Категория</div>
                        <input type="text" class="input" name="name">
                    </div>
                    <button class="btn">Создать</button>
                </form>
            </div>
            <div class="right vertical g40">
                <div class="vertical g20">
                    <h3>Таблица категорий</h3>
                    <div class="card table-wrapper">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Дата создания</th>
                                <th>Дата обновления</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>{{$category->updated_at}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category->id)}}" class="link table-link">Редактировать</a>
                                    </td>
                                    <td>
                                        <a href="{{route('category.destroy', $category->id)}}"
                                           class="link table-link red">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="vertical g20">
                    <h3>Таблица товаров</h3>
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
                                    <td class="description">{{$product->about}}</td>
                                    <td>{{$product->price}} ₽</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>
                                        <a href="{{$product->image}}" target="_blank" class="link table-link">Открыть</a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.edit', $product->id)}}" class="link table-link">Редактировать</a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.destroy', $product->id)}}"
                                           class="link table-link red">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
