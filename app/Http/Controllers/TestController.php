<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(Request $request)
    {
        // Здесь мы работаем с $request
        echo $request->method(); // вывод метода запроса
    }
    public function oldshow(Request $request)
    {
        /* если запрос имеет метод POST или GET - у нас выводится наименование метода*/
       if ($request->isMethod('post') || $request->isMethod('get')) {
           echo $request->method();
           echo '<br>';
           echo $request->path(); // 34. Путь запроса в Laravel
           echo '<br>';
           echo $request->url(); // 35. URL Запроса без параметров
           echo '<br>';
           echo $request->fullUrl(); // 36
       }
       if ($request->is('oldpost/*')) { // 37. Проверка пути по маске в Laravel
           dump('это нужный маршрут');
       }
    }
    public function view()
    {
        return view('test',[
            'var1'=>'1',
            'var2'=>'2'
        ]);
    }
    public function newview()
    {
        return view('test')
            ->with('var1','1')
            ->with('var2','2');
    }
}
