<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // 169. Создание новой записи в моделях
    public function create() {

        // 173. Мягкое удаление
        $post = Post::find(10);
        // $post->delete();
        // восстановление удаленной записи при помощи метода restore
        // Метод withTrashed - позволяет увидеть и мягко удаленные записи
        $post = Post::withTrashed()->find(10);
        $post->restore();
        // forceDelete() - позволяет полностью удалить запись из базы данных
        $post->forceDelete();

        // 172. Удаление записей по id в моделях Eloquent
        // удаление одной записи через метод destroy
        Post::destroy(3);
        // удаление нескольких записей через метод destroy
        Post::destroy([4, 5, 6]);
        // 171. Удаление записей в моделях Eloquent
        // удаление записи под номером 2
        $post = Post::find(2);
        // $post->delete();
        // удаление целой группы по условию
        $deletedRows = Post::where('id', '>', 50)->delete();

        // 170.
        $post = Post::find(1);
        $post->title = 'Новый заголовок';
        $post->save(); // save - метод сохранения
        // 169
        $post = new Post();
        $post->title = 'title';
        $post->text = 'text';
        $post->slug = 'text';
        $post->likes = 1111;
        $post->save();
    }
    public function view()
    {
        $posts = Post::find(1); // Получение одной записи
        // $posts = Post::find([1,2,3]); // Получение нескольких записей


        // $posts = Post::where('likes', 3333)->first();
        return view('post.show', ['posts' => $posts]);
    }
    // 165. Получение данных из моделей Eloquent в Laravel
    public function data()
    {
        $posts = Post::where('likes',3333)->get();
        dump($posts);
        // 167. Получение одной записи
        // Отличие от get
        // Если условию подходят несколько строк, get вернет их все,
        // а first - только первую из результата.
        // $post = Post::where('id',1)->first();

        // выводим пост где количество лайков - 3740 и id = 1, первую запись
        $post = Post::where('likes',3740)
            ->where('id',1)
            ->first();
        dump($post);

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
