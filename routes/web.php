<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider; /* Глобальные ограничения */
use App\Http\Controllers\PostController; /* Подключение контроллера */
use App\Http\Controllers\WorkController;

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

//♥☻ Задания для тасов ☻♥\\

// Урок 15. Простой маршрут, который возвращает строку.
Route::get('/', function () {
    return '!!!';
});

// Несколько простых маршрутов.
Route::get('/home', function () {
    return 'home page';
});

Route::get('/about', function () {
    return 'about page';
});

Route::get('/posts', function () {
    return 'posts list';
});

Route::get('/test', function () {
    return 'test page';
});

Route::get('/dir/test', function () {
    return 'dir test page';
});

Route::get('/contacts', function () {
    return 'contacts page';
});


// Урок 16. Один параметр маршрута: /post/5.
Route::get('/post/{id}', function ($id) {
    return 'post ' . $id;
});


// Урок 17. Несколько параметров маршрута: /user/5/John.
Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'user ' . $id . ' ' . $name;
});


// Урок 18. Необязательный параметр — знак ? и значение по умолчанию.
Route::get('/catalog/{category?}', function ($category = 'all') {
    return 'category: ' . $category;
});


// Урок 19. Ограничения параметров.
Route::get('/post-number/{id}', function ($id) {
    return 'post ' . $id;
})->whereNumber('id');

Route::get('/user-name/{name}', function ($name) {
    return 'user ' . $name;
})->whereAlpha('name');

Route::get('/product/{code}', function ($code) {
    return 'product ' . $code;
})->whereAlphaNumeric('code');


// Урок 20. Ограничения сразу для нескольких параметров.
Route::get('/profile/{id}/{name}', function ($id, $name) {
    return 'profile ' . $id . ' ' . $name;
})->where([
    'id' => '[0-9]+',
    'name' => '[a-z]{3,}',
]);

Route::get('/posts-date/{date}', function ($date) {
    return 'date: ' . $date;
})->where('date', '[0-9]{4}-[0-9]{2}-[0-9]{2}');

Route::get('/date/{year}/{month}/{day}', function ($year, $month, $day) {
    return $year . '-' . $month . '-' . $day;
})->where([
    'year' => '[0-9]{4}',
    'month' => '[0-9]{1,2}',
    'day' => '[0-9]{1,2}',
]);

Route::get('/users-order/{order}', function ($order) {
    return 'order by ' . $order;
})->whereIn('order', ['name', 'surname', 'age']);


// Урок 21. Шаблонные ограничения (регулярное выражение).
Route::get('/page/{slug}', function ($slug) {
    return 'page: ' . $slug;
})->where('slug', '[A-Za-z0-9_-]+');


// Урок 22. Глобальное ограничение параметра.
Route::pattern('globalId', '[0-9]+');

Route::get('/global-post/{globalId}', function ($globalId) {
    return 'global post ' . $globalId;
});


// Урок 23. Разрешение конфликтов маршрутов.
// Более конкретный маршрут должен быть объявлен раньше динамического.
Route::get('/articles/archive', function () {
    return 'article archive';
});

Route::get('/articles/{id}', function ($id) {
    return 'article ' . $id;
})->whereNumber('id');


// Урок 24. Группировка маршрутов с общим префиксом.
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'admin users';
    });

    Route::get('/posts', function () {
        return 'admin posts';
    });
});


// Урок 25. Именованные маршруты.
Route::get('/page/{id}', [PostController::class, 'page'])
    ->whereNumber('id')
    ->name('page.show');

Route::get('/named-post/{id}', function ($id) {
    return 'named post ' . $id;
})->whereNumber('id')->name('posts.named');

// Пример формирования URL по имени маршрута:
// route('page.show', ['id' => 10])
// redirect()->route('page.show', ['id' => 10])


// Маршруты для примеров контроллеров (уроки 26–30).
Route::get('/controller-post/{id}', [PostController::class, 'show'])
    ->whereNumber('id')
    ->name('controller.post');

Route::get('/controller-user/{name}', [PostController::class, 'user'])
    ->name('controller.user');

Route::get('/controller-users/{index}', [PostController::class, 'byIndex'])
    ->whereNumber('index')
    ->name('controller.users.index');

Route::get('/controller-city/{code}', [PostController::class, 'city'])
    ->name('controller.city');

Route::get('/controller-grid/{row}/{column}', [PostController::class, 'grid'])
    ->whereNumber('row')
    ->whereNumber('column')
    ->name('controller.grid');

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
