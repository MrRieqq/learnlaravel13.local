<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практика Blade — темы 48–72</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 28px; background: #f4f5f9; color: #242536; font: 16px/1.55 Arial, sans-serif; }
        main { max-width: 1100px; margin: 0 auto; }
        h1 { margin-top: 0; text-align: center; }
        h2 { margin: 0 0 14px; color: #552b88; font-size: 21px; }
        section { margin: 18px 0; padding: 22px; background: #fff; border: 1px solid #e3e3ee; border-radius: 12px; box-shadow: 0 3px 12px #17172a0b; }
        .note { color: #686879; font-size: 14px; }
        .result { padding: 12px 14px; background: #f8f6fc; border-radius: 8px; overflow-wrap: anywhere; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 9px 11px; border: 1px solid #ddd8e8; text-align: left; }
        th { background: #f0eafa; }
        input, select { margin: 4px; padding: 7px 9px; border: 1px solid #cfc9dc; border-radius: 5px; }
        .active { color: #fff; background: #6f42a5; border-radius: 4px; padding: 3px 7px; }
        .calendar { display: flex; flex-wrap: wrap; gap: 7px; padding: 0; list-style: none; }
        .calendar li { min-width: 34px; padding: 5px; text-align: center; border: 1px solid #ded8e8; border-radius: 5px; }
        code { background: #f0edf5; padding: 2px 5px; border-radius: 4px; }
    </style>
</head>
<body>
<main>
    <h1>Практические задания Blade — темы 48–72</h1>
    <p class="note">Все задания собраны на одной странице. Данные передаются из ControllerForBlade в представление balde.blade.php.</p>

    <section>
        <h2>48. Вывод переменных в тегах</h2>
        <p>{{ $name }}</p>
        <p>{{ $age }}</p>
        <p>{{ $salary }}</p>
    </section>

    <section>
        <h2>49. Вывод переменных в атрибуты</h2>
        <a href="{{ $linkHref }}">{{ $linkText }}</a>
        <p class="note">Значения переменных подставляются в href и в текст ссылки.</p>
    </section>

    <section>
        <h2>50. Выполнение произвольного кода</h2>
        @php
            $fullName = $name . ' Петров';
            $isAdult = $age >= 18;
        @endphp
        <p>Полное имя: {{ $fullName }}</p>
        <p>Совершеннолетний: {{ $isAdult ? 'Да' : 'Нет' }}</p>
    </section>

    <section>
        <h2>51. Арифметические операции</h2>
        <p>{{ $numberA }} + {{ $numberB }} = {{ $numberA + $numberB }}</p>
        <p>{{ $numberA }} − {{ $numberB }} = {{ $numberA - $numberB }}</p>
        <p>{{ $numberA }} × {{ $numberB }} = {{ $numberA * $numberB }}</p>
        <p>{{ $numberA }} ÷ {{ $numberB }} = {{ round($numberA / $numberB, 2) }}</p>
    </section>

    <section>
        <h2>52. Работа с массивами</h2>
        <p>Массив цветов:</p>
        <ul>
            @foreach ($colors as $color)
                <li>{{ $color }}</li>
            @endforeach
        </ul>
        <p>Ассоциативный массив:</p>
        <ul>
            @foreach ($user as $key => $value)
                <li>{{ $key }}: {{ $value }}</li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>53. Проверка переменных</h2>
        @isset($optionalText)
            <p>{{ $optionalText }}</p>
        @endisset
        @empty($emptyText)
            <p>Переменная emptyText не содержит значения.</p>
        @endempty
    </section>

    <section>
        <h2>54. Вывод неэкранированных данных</h2>
        <p>Обычный безопасный вывод: {{ $htmlText }}</p>
        <p>Вывод HTML-разметки: {!! $htmlText !!}</p>
        <p class="note">Не используйте {!!!!} для пользовательского ввода без очистки: это может привести к XSS.</p>
    </section>

    <section>
        <h2>55. Комментарии Blade</h2>
        <p>На странице отображается этот текст, а комментарий ниже не попадёт в HTML-вывод.</p>
        {{-- Это комментарий Blade: он не отображается в исходном HTML страницы. --}}
    </section>

    <section>
        <h2>56. Условие if</h2>
        @if ($isAuth)
            <p>Пользователь авторизован.</p>
        @endif
    </section>

    <section>
        <h2>57. Директива else</h2>
        @if ($isAuth)
            <p>Добро пожаловать!</p>
        @else
            <p>Пожалуйста, авторизуйтесь.</p>
        @endif
    </section>

    <section>
        <h2>58. Директива elseif</h2>
        @if ($userAge < 13)
            <p>Ребёнок.</p>
        @elseif ($userAge < 18)
            <p>Подросток.</p>
        @else
            <p>Взрослый пользователь.</p>
        @endif
    </section>

    <section>
        <h2>59. Директива unless</h2>
        @unless ($isAdmin)
            <p>Пользователь не является администратором.</p>
        @endunless
    </section>

    <section>
        <h2>60. Сложные условия</h2>
        @if ($score >= 80 && $hasAccess)
            <p>Условие выполнено: балл не ниже 80 и доступ разрешён.</p>
        @elseif ($score >= 50 || $isAdmin)
            <p>Есть частичное соответствие условию.</p>
        @else
            <p>Условие не выполнено.</p>
        @endif
    </section>

    <section>
        <h2>61. Директива foreach</h2>
        <ul>
            @foreach ($fruits as $fruit)
                <li>{{ $fruit }}</li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>62. Ключи массива в цикле foreach</h2>
        <ul>
            @foreach ($prices as $product => $price)
                <li>{{ $product }} — {{ $price }} ₽</li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>63. Условия и циклы foreach</h2>
        <p>Числа больше пяти:</p>
        <ul>
            @foreach ($numbers as $number)
                @if ($number > 5)
                    <li>{{ $number }}</li>
                @endif
            @endforeach
        </ul>
    </section>

    <section>
        <h2>64. Вложенные циклы foreach</h2>
        @foreach ($groups as $groupName => $items)
            <h3>{{ $groupName }}</h3>
            <ul>
                @foreach ($items as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @endforeach
    </section>

    <section>
        <h2>65. Перебор многомерных массивов</h2>
        <table>
            <thead><tr><th>Имя</th><th>Фамилия</th><th>Зарплата</th></tr></thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['surn'] }}</td>
                    <td>{{ $employee['salary'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <section>
        <h2>66. Цикл forelse</h2>
        <ul>
            @forelse ($emptyItems as $item)
                <li>{{ $item }}</li>
            @empty
                <li>Список пуст.</li>
            @endforelse
        </ul>
    </section>

    <section>
        <h2>67. Переменная $loop</h2>
        <ul>
            @foreach ($fruits as $fruit)
                <li>№ {{ $loop->iteration }}: {{ $fruit }}
                    (элемент {{ $loop->index }}, всего {{ $loop->count }})
                    @if ($loop->first) — первый @endif
                    @if ($loop->last) — последний @endif
                </li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>68. Директива break</h2>
        <p>Перебор останавливается после числа 5:</p>
        <p class="result">
            @foreach ($numbers as $number)
                @if ($number > 5)
                    @break
                @endif
                {{ $number }}@if (!$loop->last && $number < 5), @endif
            @endforeach
        </p>
    </section>

    <section>
        <h2>69. Директива continue</h2>
        <p>Выводим только нечётные числа:</p>
        <p class="result">
            @foreach ($numbers as $number)
                @if ($number % 2 === 0)
                    @continue
                @endif
                {{ $number }}@if (!$loop->last), @endif
            @endforeach
        </p>
    </section>

    <section>
        <h2>70. Цикл for</h2>
        <ul>
            @for ($i = 1; $i <= 5; $i++)
                <li>Элемент № {{ $i }}</li>
            @endfor
        </ul>
    </section>

    <section>
        <h2>71. Блок PHP-кода в Blade</h2>
        @php
            $squares = [];
            for ($i = 1; $i <= 5; $i++) {
                $squares[] = $i * $i;
            }
        @endphp
        <p>Квадраты чисел от 1 до 5: {{ implode(', ', $squares) }}</p>
    </section>

    <section>
        <h2>72. Практика: ссылки из массива</h2>
        @foreach ($links as $link)
            <p><a href="http://{{ $link['href'] }}">{{ $link['text'] }}</a></p>
        @endforeach
    </section>

    <section>
        <h2>72. Практика: список ссылок в ul/li</h2>
        <ul>
            @foreach ($links as $link)
                <li><a href="http://{{ $link['href'] }}">{{ $link['text'] }}</a></li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>72. Практика: таблица работников с заголовками и нумерацией</h2>
        <table>
            <thead><tr><th>#</th><th>Name</th><th>Surname</th><th>Salary</th></tr></thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['surn'] }}</td>
                    <td>{{ $employee['salary'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <section>
        <h2>72. Практика: работники с зарплатой более 2000</h2>
        <table>
            <thead><tr><th>Имя</th><th>Фамилия</th><th>Зарплата</th></tr></thead>
            <tbody>
            @foreach ($employees as $employee)
                @if ($employee['salary'] <= 2000)
                    @continue
                @endif
                <tr>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['surn'] }}</td>
                    <td>{{ $employee['salary'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <section>
        <h2>72. Практика: статус и цвет пользователей</h2>
        <table>
            <thead><tr><th>Имя</th><th>Фамилия</th><th>Статус</th></tr></thead>
            <tbody>
            @foreach ($users as $userRow)
                <tr style="color: {{ $userRow['banned'] ? 'red' : 'green' }};">
                    <td>{{ $userRow['name'] }}</td>
                    <td>{{ $userRow['surn'] }}</td>
                    <td>{{ $userRow['banned'] ? 'banned' : 'active' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <section>
        <h2>72. Практика: инпуты из массива</h2>
        @foreach ($inputValues as $value)
            <input value="{{ $value }}" readonly>
        @endforeach
    </section>

    <section>
        <h2>72. Практика: выпадающий список городов</h2>
        <select>
            @foreach ($cities as $city)
                <option>{{ $city }}</option>
            @endforeach
        </select>
    </section>

    <section>
        <h2>72. Практика: календарь текущего месяца</h2>
        <ul class="calendar">
            @foreach ($days as $day)
                <li class="{{ $day === $today ? 'active' : '' }}">{{ $day }}</li>
            @endforeach
        </ul>
    </section>
</main>
</body>
</html>
