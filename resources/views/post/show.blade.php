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

<h1>Получение данных из базы данных</h1>

{{-- Вывод одного поста --}}
@if(isset($post))
    <div>
        <h2>{{ $post->title }}</h2>
        <h2>{{ $post->id }}</h2>

        <div>
            {{ $post->text }}
        </div>

        @if(isset($post->likes))
            <p>Лайки: {{ $post->likes }}</p>
        @endif

        @if(isset($post->user_name))
            <p>Автор: {{ $post->user_name }}</p>
        @endif
    </div>
@endif

{{-- Работа с коллекцией постов --}}
@if(isset($posts))
    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title ?? 'Без заголовка' }}</h2>
            <h2>ID: {{ $post->id ?? 'Не указан' }}</h2>

            @if(isset($post->text))
                <div>
                    {{ $post->text }}
                </div>
            @endif

            @if(isset($post->likes))
                <p>Лайки: {{ $post->likes }}</p>
            @endif

            @if(isset($post->user_name))
                <p>Автор: {{ $post->user_name }}</p>
            @endif

            <hr>
        </div>
    @endforeach
@endif

{{-- Вывод результата отдельных операций Query Builder --}}
@if(isset($result))
    <div>
        <h2>Результат запроса</h2>

        @if(is_iterable($result))
            @foreach($result as $key => $value)
                <p>
                    @if(is_object($value))
                        {{ json_encode($value, JSON_UNESCAPED_UNICODE) }}
                    @else
                        {{ $key }}: {{ $value }}
                    @endif
                </p>
            @endforeach
        @else
            <p>{{ $result }}</p>
        @endif
    </div>
@endif

{{-- Вывод количества записей --}}
@if(isset($count))
    <p>Количество записей: {{ $count }}</p>
@endif

{{-- Вывод значения столбца --}}
@if(isset($title))
    <p>Заголовок: {{ $title }}</p>
@endif

{{-- Вывод коллекции заголовков --}}
@if(isset($titles))
    <h2>Заголовки постов</h2>

    @foreach($titles as $title)
        <p>{{ $title }}</p>
    @endforeach
@endif

{{-- Вывод ошибок, если контроллер передал их в представление --}}
@if(isset($error))
    <p>{{ $error }}</p>
@endif

</body>
</html>
