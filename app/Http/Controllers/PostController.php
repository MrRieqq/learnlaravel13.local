<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // 165. Получение данных из моделей Eloquent в Laravel
    public function data()
    {
        // Конструктор запросов в моделях Eloquent
        $posts = Post::where('likes', '>', 6000)->get();
        return $posts;

        // через построитель запросов
        $posts = DB::table('posts')
            ->where('id', '>', 200)
            ->get();
        // то же самое через модель
        $posts = Post::where('id', '>', 200)->get();
        foreach($posts as $post){
            dump($post->title);
            dump($post->text);
        }
    }
    public function oldshow($id) {
        $posts = [
            1 => 'Вывелся текст под номером 1',
            2 => 'Вывелся текст под номером 2',
            3 => 'Вывелся текст под номером 3',
            4 => 'Вывелся текст под номером 4',
            5 => 'Вывелся текст под номером 5',
        ];

        return $posts[$id];
    }
    public function newshow($surname, $name)
    {
        return $surname . ' ' . $name;
    }
    public function shows($id)
    {
        return 'post ' . $id;
    }
    public function show() {
        return "hello world";
    }
    public function all() {
        return 'all posts';
    }
    // 41. Структура представлений
    public function example()
    {
        return view('post.post');
    }
}
