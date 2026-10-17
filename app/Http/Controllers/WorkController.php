<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class WorkController extends Controller
{

    public function show($id): string|Response
    {
        $posts = [
            1 => 'text 1',
            2 => 'text 2',
            3 => 'text 3',
            4 => 'text 4',
            5 => 'text 5',
        ];

        if (!array_key_exists((int) $id, $posts)) {
            return response('Post not found', 404);
        }

        return $posts[(int) $id];
    }

    public function page(int $id): string
    {
        return 'page ' . $id;
    }

    public function user(string $name): string|Response
    {
        $users = [
            'user1' => 'city1',
            'user2' => 'city2',
            'user3' => 'city3',
            'user4' => 'city4',
            'user5' => 'city5',
        ];

        if (!array_key_exists($name, $users)) {
            return response('User not found', 404);
        }

        return $users[$name];
    }

    public function byIndex(int $index): string|Response
    {
        $users = ['user1', 'user2', 'user3', 'user4', 'user5'];

        if (!array_key_exists($index, $users)) {
            return response('User index not found', 404);
        }

        return $users[$index];
    }

    public function city(string $code): string|Response
    {
        $cities = [
            'msk' => 'Moscow',
            'spb' => 'Saint Petersburg',
            'ekb' => 'Yekaterinburg',
        ];

        if (!array_key_exists($code, $cities)) {
            return response('City not found', 404);
        }

        return $cities[$code];
    }
    public function grid(int $row, int $column): string|Response
    {
        $users = [
            ['user1', 'user2', 'user3'],
            ['user4', 'user5', 'user6'],
            ['user7', 'user8', 'user9'],
        ];

        if (!isset($users[$row][$column])) {
            return response('User not found at these coordinates', 404);
        }

        return $users[$row][$column];
    }
}
