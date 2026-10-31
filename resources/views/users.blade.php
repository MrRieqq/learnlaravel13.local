<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Введение в Blade</title>
</head>
<body>
    <p>Параграф</p>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>
    <!-- 48. Вывод переменных в тегах Blade -->
    <p>{{ $var1 }}</p>
    <p>{{ $var2 }}</p>
    <p>{{ $var3 }}</p>
    <!-- 49. Вывод переменных в атрибуты -->
    <p class="{{ $cls }}"></p>
    <input value="{{ $val }}"/>
    <!-- 50. Выполнение произвольного кода в командах Blade -->
    <p>current timestamp: {{ time() }}</p>
    <p>today: {{ date('d.m.Y') }}</p>
    <p>full name: {{ $first . ' ' . $last }}</p>
    <p>length: {{ strlen($first) }}</p>
    <!-- 51. Арифметические операции в Blade в Laravel -->
    <p>sum: {{ $a + $b }}</p>
    <p>diff: {{ $a - $b }}</p>
    <p>product: {{ $a * $b }}</p>
    <p>quotient: {{ $a / $b }}</p>
    <p>power: {{ $a ** $b }}</p>
    <!-- 52. Работа с массивами в Blade -->
    <p>first element: {{ $arr[0] }}</p>
    <p>second element: {{ $arr[1] }}</p>
    <p>summa elements: {{ $arr[0] + $arr[1] + $arr[2] + $arr[5] }}</p>
    <p>quantity elements: {{ count($arr) }}</p>
    <!-- 53. Проверка переменных в Blade -->
    <p>{{ $var ? 'eee' : 'bbb' }}</p>
    <p>{{ $var ?? 'eee' }}</p>
    <p>{{ $year ?? date('Y') }}</p>
    <!-- 54. Вывод неэкраннированных данных в Blade -->
    <p>Hello, {!! $name !!}</p>
    <!-- 55. Комментарии в Blade -->
    <p>{{-- Комментарий --}}</p>
    <!-- 56. Условия в Blade в Laravel -->
    <p>@if($isAuth)
            Вы авторизированы
        @endif
        @if(!$isAuth)
            Вы не авторизированы
        @endif
    </p>
    <!-- 57. Директива @ else в Blade -->
    <p>
        @if ($isAuth)
            Вы авторизированы
        @else
            Вы не авторизированы
        @endif
    </p>
    <!-- 58. Директива @ elseif в Blade -->
    <p>
        @if ($num > 0)
            больше нуля
        @elseif ($num === 0)
            равняется нулю
        @else
            меньше нуля
        @endif
    </p>
    <!-- 59. Директива @ unless - является отрицанием -->
    <p>
        @unless($Auth)
            вы пока не авторизованы
        @endunless
    </p>
    <!-- 60. Сложные команды в условиях Blade -->
    @if(count($arr1) >= 1)
        в массиве есть записи
    @else
        в массиве нет записей
    @endif
    <!-- 61. Директива @ foreach -->
    <p>
        @foreach ($arr2 as $elem)
            {{ $elem }}
        @endforeach
    </p>
    <p>
        @foreach ($arr2 as $elem)
            <b>{{ $elem }}</b>
            @endforeach
    </p>
    <p>
        @foreach ($arr2 as $elem)
        <li>{{ $elem }}</li>
        @endforeach
    </p>
    <!-- 62. Ключи массива в цикле foreach -->
    <p>
        @foreach ($arr2 as $key => $elem)
            {{ $key + 1 }} {{ $elem }}
        @endforeach
    </p>
    <!-- 63. Условия и циклы @ foreach в Blade -->
    <!-- положительные элементы массива -->
    <ul>
        @foreach($arr3 as $elem)
            @if ($elem > 0)
            <li>{{ $elem }}</li>
            @endif
        @endforeach
    </ul>
    <!-- выводит, если кол-во элементов в массиве больше нуля -->
    @if(count($arr3) > 0)
        <ul>
            @foreach($arr3 as $elem)
                <li>{{ $elem }}</li>
            @endforeach
        </ul>
    @endif
    <!-- 64. Вложенные циклы @ foreach в Blade -->
    <!-- вывод элементов массива через вложенные директивы foreach -->
    <p>
        @foreach ($arr4 as $subArr)
            @foreach($subArr as $elem)
            {{ $elem }}
            @endforeach
        @endforeach
    </p>
    <ul>
        @foreach($arr4 as $subArr)
            <li>
                <ul>
                    @foreach($subArr as $elem)
                        <li>{{$elem}}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
    <!-- 65. Перебор многомерных массивов -->
    @foreach($users1 as $user)
        <li>{{ $user['name'] }} {{ $user['age'] }}</li>
    @endforeach
    <!-- 66. Цикл @ forelse в Blade -->
    @forelse ($arr5 as $elem)
        <p>{{ $elem }}</p>
    @empty
        <p>массив пустой</p>
    @endforelse
    <!-- 67. Переменная $loop в Blade -->
    <!-- граничные итерации -->
    @foreach($arr5 as $elem)
        @if($loop->first)
            первая итерация
        @endif

        @if ($loop->last)
            последняя итерация
        @endif

        {{ $elem }}
    @endforeach
    <!-- четность итерации цикла -->
    <br>
    @foreach($arr5 as $elem)
        @if($loop->odd)
        нечетная итерация
        @endif

        @if ($loop->even)
        четная итерация
        @endif
        {{ $elem }}
    @endforeach
    <!-- итерации (узнать индекс текущей итерации) -->
    <!-- индекс текущей итерации -->
    <br>
    @foreach($arr5 as $elem)
        {{ $loop->index }}
        {{ $elem }}
    @endforeach
    <!-- номер текущей итерации -->
    <br>
    @foreach($arr5 as $elem)
        {{ $loop->iteration }}
        {{ $elem }}
    @endforeach
    <!-- сколько итераций осталось -->
    <br>
    @foreach($arr5 as $elem)
        {{ $loop->remaining }}
        {{ $elem }}
    @endforeach
    <!-- количество элементов -->
    @foreach($arr5 as $elem)
        {{ $loop->count }}
        {{ $elem }}
    @endforeach
    <!-- 68. Директива @ break в Blade -->
    <br>
    <!-- break - позволяет завершать работу цикла -->
    @foreach($arr6 as $elem)
        {{ $elem }}
        @if ($elem == 3)
            @break
        @endif
    @endforeach
    <!-- включение условия в строку объявления директивы -->
    <br>
    @foreach ($arr6 as $elem)
        {{ $elem }}
        @break($elem == 3)
    @endforeach
    <!-- 69. Директива @ continue в Blade  -->
    <br>
    <!-- переход к следующей итерации цикла при помощи continue -->
    @foreach ($arr6 as $elem)
        @if($elem == 3)
        @continue
        @endif
        {{ $elem }}
    @endforeach
    <!-- включение условия в строку объявления директивы -->
    <br>
    @foreach($arr6 as $elem)
        @continue($elem == 3)
        {{ $elem }}
    @endforeach
    <!-- 70. Цикл for в Blade  -->
    <!-- счетчик от 0 до 9 -->
    @for($i = 0; $i < 10; $i++)
        <br>счетчик: {{ $i }}
    @endfor
    <!-- вывод для разметки списка -->
    <ul>
        @for ($i = 1; $i <= 5; $i++)
            <li>элемент {{ $i }}</li>
        @endfor
    </ul>
    @for($i = 1; $i <= $count; $i++)
        <p>шаг {{ $i }}</p>
    @endfor
    <!-- 71. Блок PHP кода в Blade -->
    @php
        echo 123;
    @endphp
</body>
</html>
