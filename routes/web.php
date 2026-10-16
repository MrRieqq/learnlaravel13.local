<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return '!!!!!!!';
});
Route::get('/about', function () {
    return 'about page';
});
Route::get('/about/{id}', function ($id) {
    return 'Номер страницы ' . $id;
});
Route::get('/animals/{catId}/{mouseId}', function ($catId, $mouseId) {
    return 'ID Кошки: ' . $catId . ' ID Мыши: ' . $mouseId;
});
// Ограничение параметров маршрутов в Laravel
Route::get('/post/{id}', function ($id) {
    return 'post ' . $id;
})->where('id', '[0-9]+'); // where - условие "где"
// Ограничение на несколько параметров
Route::get('/post/{slug}/{id}', function ($slug,$id) {
    return 'post ' . $slug . $id;
})->where('slug', '[a-z0-9_-]+') // a-z - любые строчные (маленькие) буквы латинского алфавита от a до z
    ->where('id', '[0-9]+'); // 0-9 - любые цифры от 0 до 9
// Шаблонные ограничения параметров маршрутов
Route::get('/post/{id}', function ($id) {
    return 'post ' . $id;
})->whereNumber('id'); // ограничение только буквами
// Шаблонные ограничения параметров маршрутов
Route::get('/post/{slug}', function ($slug) {
    return 'post ' . $slug;
})->whereAlphaNumeric('slug'); // ограничение только цифрами
// Шаблонные ограничения параметров маршрутов
Route::get('/users/{order}', function ($order) {
    return 'sort: ' . $order;
})->whereIn('order', ['name', 'surname', 'age']); // ограничение только цифрами и буквами
