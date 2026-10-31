<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/migrate.css') }}">
    <script src="{{ asset('js/migrate.js') }}"></script>
    <!--
        asset - вспомогательная функция, которая генерирует корректный URL для файла,
        автоматически подставляет базовый URL для сайта
    -->
    <title>Document</title>
</head>
<body>
    <p class="asset">Параграф</p>
    <img src="{{ asset('images/logo.webp') }}" alt="logo">
</body>
</html>
