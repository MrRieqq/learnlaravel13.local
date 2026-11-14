<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Практика Laravel 194–230</title>
</head>
<body>
<style>
    body {
        background-image: url("{{ asset('images/img.png') }}");
        background-size: 1000px;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        min-height: 100vh;
    }
</style>
<div class="container">

    <div>

    </div>
    <h1>Практическая работа Laravel</h1>

    <p class="description">
        Задания №194–230: формы и валидация данных
    </p>

    {{-- Результат успешной отправки --}}
    @if(isset($result) && $result)
        <div class="success">
            <strong>{{ $result }}</strong>
        </div>
    @endif

    {{-- Вывод полученных данных --}}
    @if(!empty($submittedData))
        <div class="result">
            <h2>Результат обработки формы</h2>

            @foreach($submittedData as $key => $value)
                <h3>{{ $key }}</h3>

                <pre>{{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            @endforeach
        </div>
    @endif

    {{-- Результат обработки параметров маршрута --}}
    @if(!empty($routeResult))
        <div class="result">
            <h2>Параметры маршрута и Request</h2>

            @foreach($routeResult as $key => $value)
                <strong>{{ $key }}</strong>

                <pre>{{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            @endforeach
        </div>
    @endif

    {{-- Основная форма --}}
    <form action="{{ route('work.submit') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <h2>1. Основная информация</h2>

        <div class="field">
            <label>Имя пользователя</label>

            @error('name')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   placeholder="Введите имя">
        </div>

        <div class="field">
            <label>Имя (только буквы)</label>

            @error('first_name')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="first_name"
                   value="{{ old('first_name') }}">
        </div>

        <div class="field">
            <label>Возраст (18–100)</label>

            @error('age')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="number"
                   name="age"
                   value="{{ old('age') }}">
        </div>

        <div class="field">
            <label>Цена (от 1 до 9999)</label>

            @error('price')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ old('price') }}">
        </div>

        <h2>2. Email и логин</h2>

        <div class="field">
            <label>Email</label>

            @error('email')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="email"
                   name="email"
                   value="{{ old('email') }}">
        </div>

        <div class="field">
            <label>Логин (латинские буквы в нижнем регистре)</label>

            @error('login')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="login"
                   value="{{ old('login') }}">
        </div>

        <h2>3. Работа со строками</h2>

        <div class="field">
            <label>Заголовок (5–100 символов)</label>

            @error('title')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="title"
                   value="{{ old('title') }}">
        </div>

        <div class="field">
            <label>Код (4 символа)</label>

            @error('code')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="code"
                   value="{{ old('code') }}">
        </div>

        <div class="field">
            <label>PIN-код (6 цифр)</label>

            @error('pin')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="pin"
                   value="{{ old('pin') }}">
        </div>

        <div class="field">
            <label>Год (4 цифры)</label>

            @error('year')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="year"
                   value="{{ old('year') }}">
        </div>

        <div class="field">
            <label>Сайт (URL)</label>

            @error('website')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="website"
                   value="{{ old('website') }}"
                   placeholder="https://example.com">
        </div>

        <div class="field">
            <label>Slug (буквы, цифры, дефис, подчёркивание)</label>

            @error('slug')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="slug"
                   value="{{ old('slug') }}">
        </div>

        <div class="field">
            <label>Необязательная заметка</label>

            @error('note')
            <span class="error">{{ $message }}</span>
            @enderror

            <textarea name="note">{{ old('note') }}</textarea>
        </div>

        <h2>4. Работа с датами</h2>

        <div class="field">
            <label>Дата рождения</label>

            @error('birthday')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="date"
                   name="birthday"
                   value="{{ old('birthday') }}">
        </div>

        <div class="field">
            <label>Крайний срок (будущая дата)</label>

            @error('deadline')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="date"
                   name="deadline"
                   value="{{ old('deadline') }}">
        </div>

        <div class="field">
            <label>Дата начала</label>

            @error('start_at')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="date"
                   name="start_at"
                   value="{{ old('start_at') }}">
        </div>

        <div class="field">
            <label>Дата окончания</label>

            @error('end_at')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="date"
                   name="end_at"
                   value="{{ old('end_at') }}">
        </div>

        <h2>5. Списки и чекбоксы</h2>

        <div class="field">
            <label>Статус</label>

            @error('status')
            <span class="error">{{ $message }}</span>
            @enderror

            <select name="status">
                <option value="">Выберите статус</option>
                <option value="draft" @selected(old('status') == 'draft')>
                    Черновик
                </option>
                <option value="published" @selected(old('status') == 'published')>
                    Опубликован
                </option>
            </select>
        </div>

        <div class="field">
            <label>Роль</label>

            @error('role')
            <span class="error">{{ $message }}</span>
            @enderror

            <select name="role">
                <option value="">Выберите роль</option>
                <option value="user" @selected(old('role') == 'user')>
                    Пользователь
                </option>
                <option value="admin" @selected(old('role') == 'admin')>
                    Администратор
                </option>
            </select>
        </div>

        <div class="checkbox">
            <input type="checkbox"
                   id="terms"
                   name="terms"
                   value="1"
                @checked(old('terms'))>

            <label for="terms">
                Согласен с правилами
            </label>
        </div>

        @error('terms')
        <span class="error">{{ $message }}</span>
        @enderror

        <div class="checkbox">
            <input type="hidden" name="is_active" value="0">

            <input type="checkbox"
                   id="is_active"
                   name="is_active"
                   value="1"
                @checked(old('is_active'))>

            <label for="is_active">
                Активный пользователь
            </label>
        </div>

        @error('is_active')
        <span class="error">{{ $message }}</span>
        @enderror

        <h2>6. Пароль</h2>

        <div class="field">
            <label>Пароль (буквы и цифры, минимум 8 символов)</label>

            @error('password')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="password" name="password">
        </div>

        <div class="field">
            <label>Подтверждение пароля</label>

            <input type="password"
                   name="password_confirmation">
        </div>

        <h2>7. Регулярные выражения</h2>

        <div class="field">
            <label>Номер телефона (только цифры)</label>

            @error('phone')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="phone"
                   value="{{ old('phone') }}">
        </div>

        <h2>8. Массивы</h2>

        <div class="field">
            <label>Теги (до 3 штук)</label>

            @error('tags')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="tags[]"
                   placeholder="Первый тег">

            <input type="text"
                   name="tags[]"
                   placeholder="Второй тег">

            <input type="text"
                   name="tags[]"
                   placeholder="Третий тег">
        </div>

        <div class="field">
            <label>Роли (максимум 3)</label>

            @error('roles')
            <span class="error">{{ $message }}</span>
            @enderror

            <div class="checkbox">
                <input type="checkbox"
                       name="roles[]"
                       value="user"
                    @checked(in_array('user', old('roles', [])))>
                <label>Пользователь</label>
            </div>

            <div class="checkbox">
                <input type="checkbox"
                       name="roles[]"
                       value="admin"
                    @checked(in_array('admin', old('roles', [])))>
                <label>Администратор</label>
            </div>

            <div class="checkbox">
                <input type="checkbox"
                       name="roles[]"
                       value="editor"
                    @checked(in_array('editor', old('roles', [])))>
                <label>Редактор</label>
            </div>
        </div>

        <h2>9. Проверка существования и условные правила</h2>

        <div class="field">
            <label>ID автора (должен существовать в users)</label>

            @error('author_id')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="number"
                   name="author_id"
                   value="{{ old('author_id', 1) }}">
        </div>

        <div class="field">
            <label>Тип пользователя</label>

            @error('type')
            <span class="error">{{ $message }}</span>
            @enderror

            <select name="type">
                <option value="">Выберите тип</option>
                <option value="person" @selected(old('type') == 'person')>
                    Физическое лицо
                </option>
                <option value="business" @selected(old('type') == 'business')>
                    Компания
                </option>
            </select>
        </div>

        <div class="field">
            <label>Название компании (обязательно для business)</label>

            @error('company')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="company"
                   value="{{ old('company') }}">
        </div>

        <div class="field">
            <label>Дополнительный телефон (необязательный)</label>

            @error('optional_phone')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="text"
                   name="optional_phone"
                   value="{{ old('optional_phone') }}">
        </div>

        <h2>10. Проверка диапазона цен</h2>

        <div class="field">
            <label>Минимальная цена</label>

            @error('min_price')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="number"
                   step="0.01"
                   name="min_price"
                   value="{{ old('min_price') }}">
        </div>

        <div class="field">
            <label>Максимальная цена</label>

            @error('max_price')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="number"
                   step="0.01"
                   name="max_price"
                   value="{{ old('max_price') }}">
        </div>

        <h2>11. Загрузка файлов</h2>

        <div class="field">
            <label>Аватар (JPG или PNG, до 500x500)</label>

            @error('avatar')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="file"
                   name="avatar"
                   accept=".jpg,.jpeg,.png">
        </div>

        <div class="field">
            <label>Обложка (минимальная ширина 800px)</label>

            @error('cover')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="file"
                   name="cover"
                   accept="image/*">
        </div>

        <div class="field">
            <label>Документ PDF (необязательно)</label>

            @error('doc')
            <span class="error">{{ $message }}</span>
            @enderror

            <input type="file"
                   name="doc"
                   accept=".pdf">
        </div>

        <hr>

        <button type="submit">
            Отправить форму
        </button>

    </form>

    <hr>

    {{-- Задания 196–199: сложные имена полей --}}

    <h2>12. Работа с вложенными данными</h2>

    <form action="{{ route('work.submit') }}"
          method="POST">

        @csrf

        <div class="field">
            <label>Имя пользователя</label>

            <input type="text"
                   name="user[name]"
                   value="{{ old('user.name') }}">
        </div>

        <div class="field">
            <label>Фамилия пользователя</label>

            <input type="text"
                   name="user[surname]"
                   value="{{ old('user.surname') }}">
        </div>

        <p class="hint">
            Вложенные поля демонстрируют работу с массивами Request.
            Для полной отправки основной формы используйте первую форму.
        </p>

    </form>

    <hr>

    {{-- Задание 200: параметры маршрута --}}

    <h2>13. Параметры маршрута и Request</h2>

    <form action="{{ route('work.route', [
        'id' => 1,
        'login' => 'student'
    ]) }}"
          method="POST">

        @csrf

        <div class="field">
            <label>Дополнительные данные</label>

            <input type="text"
                   name="extra"
                   placeholder="Введите данные">
        </div>

        <button type="submit">
            Отправить параметры маршрута
        </button>

    </form>

</div>

</body>
</html>
