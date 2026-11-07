<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['orderlists', 'client'])->get();
        foreach ($orders as $order) {
            dump($order);
            dump($order->orderlists);
            dump($order->client);
        }

        $orders = Order::all();
        dump($orders);
    }

    // 181. Получение данных связь один ко многим
    public function show()
    {
        $orders = Order::all();
        foreach($orders as $order) {
            dump($order->id);

            if ($order->client) {
                dump($order->client->id);
                dump($order->client->name);
            }
        }


        $order = Order::find(1);
        // Получили клиента по заказу
        dump($order->client);
    }
}
