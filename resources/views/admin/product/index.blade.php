<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Страница редактирования товара</title>
</head>
<body>
@include('shared.notification')
<main class="auth main">
    <div class="container">
        <form action="{{route('product.update', $product->id)}}" method="post" class="card form vertical g20"
              enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="vertical g0">
                <div class="hint">Наименование</div>
                <input type="text" class="input" name="name" value="{{$product->name}}">
            </div>
            <div class="vertical g0">
                <div class="hint">Описание</div>
                <textarea type="text" class="input" name="about">{{$product->about}}</textarea>
            </div>
            <div class="vertical g0">
                <div class="hint">Категория</div>
                <select type="text" class="input" name="category_id">
                    @foreach($categories as $category)
                        <option {{$product->category_id === $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="vertical g0">
                <div class="hint">Цена</div>
                <input type="number" class="input" name="price" value="{{$product->price}}">
            </div>
            <div class="vertical g0">
                <div class="hint">Фото</div>
                <input type="file" class="input full" name="image">
            </div>
            <button class="btn" type="submit">Обновить</button>
        </form>
    </div>
</main>
</body>
</html>
