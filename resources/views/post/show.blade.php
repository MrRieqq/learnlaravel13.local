<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Получение данных</title>
</head>
<body>
@if($posts)
    <p><b>Количество лайков на посте: </b>{{ $posts->likes }}</p>
    <p><b>Зашифрованный текст: </b>{{ $posts->text }}</p>
    <p><b>URL-токен поста: </b>{{ $posts->slug }}</p>
@else
    <p>Пост не найден</p>
@endif
<!-- <h1>Получение данных из базы данных </h1>-->
{{--
<div>
    <h2>{{ $posts->title }}</h2>
    <h2>{{ $posts->id }}</h2>
    <div>
        {{ $posts->text }}
    </div>
</div>
--}}
</body>
</html>
