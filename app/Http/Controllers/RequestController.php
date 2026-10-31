<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // импортируем фасад баз данных

class RequestController extends Controller
{
    public function show()
    {


        /*
        // 141. Соединение таблиц через JOIN
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name as user_name')
            ->get();

        return view('post.show', compact('posts'));
        */

        /*
        // 140. Удаление записей через Query Builder
        DB::table('posts')
            ->where('id', 1)
            ->delete();

        return 'Пост удалён';
        */

        /*
        // 139. Обновление записей через Query Builder
        DB::table('posts')
            ->where('id', 1)
            ->update([
                'title' => 'Новый заголовок',
                'likes' => 100,
            ]);

        return 'Пост обновлён';
        */

        /*
        // 138. Добавление записи с получением ID
        $id = DB::table('posts')->insertGetId([
            'title' => 'Новый пост',
            'text' => 'Текст нового поста',
            'likes' => 0,
        ]);

        dump($id);
        */

        /*
        // 137. Добавление записи через Query Builder
        DB::table('posts')->insert([
            'title' => 'Новый пост',
            'text' => 'Текст нового поста',
            'likes' => 0,
        ]);

        return 'Пост добавлен';
        */

        /*
        // 136. Ограничение количества записей и пропуск записей
        $posts = DB::table('posts')
            ->offset(3)
            ->limit(5)
            ->get();

        return view('post.show', compact('posts'));
        */

        /*
        // 135. Получение последних записей
        $posts = DB::table('posts')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        return view('post.show', compact('posts'));
        */

        /*
        // 134. Сортировка записей по убыванию
        $posts = DB::table('posts')
            ->orderBy('likes', 'desc')
            ->get();

        return view('post.show', compact('posts'));
        */

        /*
        // 133. Сортировка записей по возрастанию
        $posts = DB::table('posts')
            ->orderBy('likes', 'asc')
            ->get();

        return view('post.show', compact('posts'));
        */

        /*
        // 132. Выбор уникальных значений
        $titles = DB::table('posts')
            ->select('title')
            ->distinct()
            ->get();

        dump($titles);
        */

        /*
        // 131. Проверка отсутствия записей
        $exists = DB::table('posts')->doesntExist();

        dump($exists);
        */

        /*
        // 130. Проверка наличия записей
        $exists = DB::table('posts')->exists();

        dump($exists);
        */

        /*
        // 129. Получение суммы значений столбца
        $sumLikes = DB::table('posts')->sum('likes');

        dump($sumLikes);
        */

        /*
        // 128. Получение среднего значения столбца
        $avgLikes = DB::table('posts')->avg('likes');

        dump($avgLikes);
        */

        /*
        // 127. Получение минимального значения столбца
        $minLikes = DB::table('posts')->min('likes');

        dump($minLikes);
        */

        /*
        // 126. Получение максимального значения столбца
        $maxLikes = DB::table('posts')->max('likes');

        dump($maxLikes);
        */

        /*
        // 125. Получение количества записей через Query Builder
        $count = DB::table('posts')->count();

        dump($count);
        */


        // 124. Получение коллекции значений столбца через QB в Laravel
        // для получения коллекции одного столбца, собранную со всех рядов, используется метод pluck
        $titles = DB::table('posts')->pluck('title');
        dump($titles);
        // можно перебирать полученные данные циклом
        $titles = DB::table('posts')->pluck('title');
        foreach ($titles as $title) {
            echo "<br>";
            echo $title;
        }
        // можно получить не все посты, а только попадающие под условие
        $titles = DB::table('posts')
            ->where('id', '>', '3')
            ->pluck('title');
        dump($titles);

        // 123. Получение значения одного столбца QueryBuilder в Laravel
        $title = DB::table('posts')->where('id', 1)->value('title');
        echo $title;

        /*
        // 122. Получение одной строки через QB в Laravel
        $posts = DB::table('posts')->where('id', 1)->first();
        return view('post.show', compact('posts'));
        */

        // 121. Сложные условия при выборке через QB в Laravel
        /*
        $posts = DB::table('posts')
            ->where('id', '=', 3)
            ->orWhere(function ($query) {
                $query
                    ->where('likes', '>', 5000)
                    ->where('likes', '<', 20000);
            })
            ->get();
        return view('post.show', compact('posts'));
        */

        /*
        // 120. Условия orWhere при выборке через QB в Laravel
        $posts = DB::table('posts')
            ->where('id', '<', 3)
            ->orWhere('likes', '>', 3000)
            ->get();
        return view('post.show', compact('posts'));
        */

        /*
        // 119. Несколько условий where при выборке через QB в Laravel
        $posts = DB::table('posts')
            ->where('likes', '>', 4000)
            ->where('likes', '<', 20000)
            ->get();
        return view('post.show', compact('posts'));
        */


        /*
        // 118. Условия where при выборке через QB в Laravel
        $posts = DB::table('posts')->where('likes','>', 100)->get();
        return view('post.show', ['posts' => $posts]);
        */

        // 117. Поля выборки через QB в Laravel (select - выбираем два поля - title и text)
        /*
        $posts = DB::table('posts')->select('title', 'text')->get();
        // Переименование столбцов
        $posts = DB::table('posts')->select('title', 'text as post_text')->get();
        */

        // 116. Просмотр SQL запросов в Laravel
        /*
        // через QueryLog
        DB::enableQueryLog();
        DB::table('posts')->where('id', '>', 2)->get();
        dump(DB::getQueryLog());
        // вывод через toSql
        $query = DB::table('posts')->where('id', '>', 2)->toSql();
        dump($query);
        // просмотр запроса через метод dump and die (dd)
        DB::table('posts')->where('id', '>', 2)->dd();
        // просмотр запроса через метод dump
        // DB::table('posts')->where('id', '>', 2)->dupm();
        */


        // 115. Вывод полученных записей в представлении в Laravel
        /*
        $posts = DB::table( 'posts')->get();
        return view('post.show', ['posts' => $posts]);
        */
        /*
        // 114. Получение всех записей через Query Builder
        $posts = DB::table(table: 'posts')->get();
        dump($posts);

        foreach ($posts as $post) {
            dump($post->title);
            dump($post->text);
        }
        */
    }
}
