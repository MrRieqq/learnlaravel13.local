<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider; /* Глобальные ограничения */
use App\Http\Controllers\PostController; /* Подключение контроллера */

Route::get('/newpost', [PostController::class, 'show']); // Сокращенная запись обращения к контроллеру
Route::get('/newposts', [PostController::class, 'all']); // Обращение ко второму методу контроллера
Route::get('/longpost', [\App\Http\Controllers\Controller::class, '#']); // Удлиненная запись

Route::get('/rarepost/{id}', [PostController::class, 'shows']); //
Route::get('/rarepost/{surname}/{name}', [PostController::class, 'newshow']); //
Route::get('/oldpost/{id}', [PostController::class, 'oldshow']); //

Route::get('/oldpost', [TestController::class, 'show']);
Route::get('oldpost/newpost/1', [TestController::class, 'oldshow']);

/* 39. Представления в Laravel */
Route::get('/views', [TestController::class, 'view']);
Route::get('/newviews', [TestController::class, 'newview']);

// 41. Структура представлений
Route::get('/example', [PostController::class, 'example']);


//♦♣♠♥☻☺
/* 22. Глобальное ограничение
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');
    }
}
*/


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

// Разрешение конфликтов маршрутов
Route::get('/post/{id}', function ($id) {
    return 'id';
})->whereNumber('id');
Route::get('/post/all', function () {
    return 'all';
});

// Группировка маршрутов в Laravel
Route::get('/blog/post/all', function () {
    return 'all';
});
Route::get('/blog/post/{id}', function ($id) {
    return $id;
});

// Именованные маршруты в Laravel
Route::get('/newblog/all/{id}', function ($id) {
    return 'blogs ' . $id;
})->name('blogs');
