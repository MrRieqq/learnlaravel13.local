<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider; /* Глобальное ограничение */
use App\Http\Controllers\PostController; /* Подключение контроллера */
use App\Http\Controllers\TestController; /* Подключение контроллера */
use App\Http\Controllers\RequestController; /* 114. Подключение контроллера */
use App\Http\Controllers\WorkController;

// ====Задания с 194 по 230====

// Главная страница с формами
Route::get('/work', [WorkController::class, 'index'])
    ->name('work.index');

// Отправка и обработка формы методом POST
Route::post('/work', [WorkController::class, 'submit'])
    ->name('work.submit');

// Один маршрут для GET и POST
Route::match(['get', 'post'], '/work/{id}/{login}',
    [WorkController::class, 'routeExample']
)->name('work.route');



Route::get('/migration', [RequestController::class, 'show']);

// 181. Получение данных связь один ко многим
Route::get('/order/client', [OrderController::class, 'show']);
// 189. Жадная загрузка множественных отношений
Route::get('/order/client/index', [OrderController::class, 'index']);

Route::get('/newpost', [PostController::class, 'show']); // Сокращенная запись обращения к контроллеру
Route::get('/newposts', [PostController::class, 'all']); // Обращение ко второму методу контроллера
Route::get('/longpost', [\App\Http\Controllers\Controller::class, '#']); // Удлиненная запись

// 165. Получение данных из моделей Eloquent в Laravel
Route::get('/rarepost/data', [PostController::class, 'data']);
// 167. Передача в представление
Route::get('/rarepost/view', [PostController::class, 'view']);
Route::get('/rarepost/create', [PostController::class, 'create']);

Route::get('/rarepost/{surname}/{name}', [PostController::class, 'newshow']);
Route::get('/oldpost/{id}', [PostController::class, 'oldshow']);

Route::get('/oldpost', [TestController::class, 'show']);
Route::get('/oldpost/newpost/1', [TestController::class, 'oldshow']);

/* 39. Представления в Laravel */
Route::get('/views', [TestController::class, 'view']);
Route::get('/newviews', [TestController::class, 'newview']);

// 41. Структура представлений
Route::get('/example', [PostController::class, 'example']);
Route::get('/example/1', function() {
    return view('components.layout');
});


/* ♣♠♦♥☻ */
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
    return view ('migrate');
});


Route::get('/about', function () {
    return 'about page';
});
Route::get('/about/{id}', function ($id) {
    return 'Номер страницы ' . $id;
});
Route::get('/animals/{catId}/{mouseId?}', function ($catId, $mouseId = 1) {
    return  'ID кошки: ' . $catId . ' ID мыши: ' . $mouseId;
});

// Ограничение параметров маршрутов в Laravel
Route::get('/post/{id}', function ($id) {
    return 'post ' . $id;
})->where('id', '[0-9]+'); // where - условие "где"

// Ограничения на несколько параметров
Route::get('/post/{slug}/{id}', function ($slug, $id) {
    return 'post ' . $slug . ' id ' . $id;
})->where('slug', '[a-z0-9_-]+') // a-z - любые строчные (маленькие) буквы латинского алфавита от a до z
->where('id', '[0-9]+');  // 0-9 - любые цифры от 0 до 9

// Шаблонные ограничения параметров маршрутов
Route::get('/posts/{id}' , function ($id) {
    return 'posts ' . $id;
})->whereNumber('id'); // ограничение только цифрами

// Шаблонные ограничения параметров маршрутов
Route::get('/posts/{slug}' , function ($slug) {
    return 'posts ' . $slug;
})->whereAlpha('slug'); // ограничение только буквами

// Шаблонные ограничения параметров маршрутов
Route::get('/posts/{slug}' , function ($slug) {
    return 'posts ' . $slug;
})->whereAlphaNumeric('slug'); // ограничение только цифрами и буквами

// Шаблонные ограничения параметров маршрутов
Route::get('/users/{order}' , function ($order) {
    return 'sort: ' . $order;
})->whereIn('order', ['name', 'surname', 'age']); // ограничение только цифрами и буквами

// Разрешение конфликтов маршрутов
Route::get('/get/{id}', function ($id) {
    return 'id';
})->whereNumber('id');
Route::get('/get/all', function () {
    return 'all';
});

// Группировка маршрутов в Laravel
// вынесем общую часть через prefix и group
Route::prefix('blog')->group(function() {
    Route::get('/blog/post/all', function() {
        return 'all';
    });
    Route::get('/blog/post/{id}', function($id) {
        return $id;
    });
});

// Именованные маршруты в Laravel
Route::get('/newblog/all/{id}', function($id) {
    return 'blogs ' . $id;
})->name('blogs');

/* 47. Введение в Blade в Laravel */
Route::get('/users', [UserController::class, 'index']);
