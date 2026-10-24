<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ControllerForBlade extends Controller
{
    public function index()
    {
        $today = now()->day;
        $days = range(1, now()->daysInMonth);

        return view('balde', [
            // Тема 48. Вывод переменных в тегах
            'name' => 'Иван',
            'age' => 20,
            'salary' => 75000,

            // Тема 49. Вывод переменных в атрибуты
            'linkText' => 'Открыть сайт Laravel',
            'linkHref' => 'https://laravel.com',

            // Тема 50. Произвольный код и тема 51. Арифметика
            'numberA' => 12,
            'numberB' => 5,

            // Тема 52. Работа с массивами
            'colors' => ['Красный', 'Зелёный', 'Синий'],
            'user' => ['name' => 'Анна', 'age' => 22, 'city' => 'Москва'],

            // Тема 53. Проверка переменных
            'optionalText' => 'Эта переменная существует',
            'emptyText' => '',

            // Тема 54. Неэкранированные данные
            'htmlText' => '<strong>HTML-текст</strong>',

            // Тема 56–60. Условия
            'isAuth' => true,
            'userAge' => 20,
            'score' => 87,
            'isAdmin' => false,
            'hasAccess' => true,

            // Тема 61–64. Циклы и массивы
            'fruits' => ['Яблоко', 'Банан', 'Апельсин', 'Груша'],
            'prices' => ['Хлеб' => 50, 'Молоко' => 90, 'Сыр' => 320],
            'numbers' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'groups' => [
                'Фрукты' => ['Яблоко', 'Банан', 'Груша'],
                'Овощи' => ['Огурец', 'Морковь', 'Помидор'],
            ],
            'emptyItems' => [],
            'employees' => [
                ['name' => 'user1', 'surn' => 'surn1', 'salary' => 1000],
                ['name' => 'user2', 'surn' => 'surn2', 'salary' => 2000],
                ['name' => 'user3', 'surn' => 'surn3', 'salary' => 3000],
                ['name' => 'user4', 'surn' => 'surn4', 'salary' => 4000],
                ['name' => 'user5', 'surn' => 'surn5', 'salary' => 5000],
            ],
            'users' => [
                ['name' => 'user1', 'surn' => 'surn1', 'banned' => true],
                ['name' => 'user2', 'surn' => 'surn2', 'banned' => false],
                ['name' => 'user3', 'surn' => 'surn3', 'banned' => true],
                ['name' => 'user4', 'surn' => 'surn4', 'banned' => false],
                ['name' => 'user5', 'surn' => 'surn5', 'banned' => false],
            ],

            // Тема 72. Итоговая практика
            'links' => [
                ['text' => 'text1', 'href' => 'href1'],
                ['text' => 'text2', 'href' => 'href2'],
                ['text' => 'text3', 'href' => 'href3'],
            ],
            'inputValues' => ['aaa', 'bbb', 'ccc', 'ddd'],
            'cities' => ['Moscow', 'London', 'Paris'],
            'days' => $days,
            'today' => $today,
        ]);
    }
}
