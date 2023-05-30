<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Страница редактирования категории</title>
</head>
<body>
@include('shared.notification')
<main class="auth main">
    <div class="container">
        <form action="{{route('category.update', $category->id)}}" class="form card vertical g20" method="post">
            @csrf
            @method('patch')
            <div class="vertical g0">
                <div class="hint">Название</div>
                <input type="text" class="input" name="name" value="{{$category->name}}">
            </div>
            <button class="btn" type="submit">Обновить</button>
        </form>
    </div>
</main>
</body>
</html>
