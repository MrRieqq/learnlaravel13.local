<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class WorkController extends Controller
{
    // Задание 194–195: отображение формы
    public function index()
    {
        return view('work', [
            'result' => null,
            'submittedData' => [],
            'routeResult' => null,
        ]);
    }

    // Задания 194–230: обработка формы и валидация
    public function submit(Request $request)
    {
        // Проверка наличия данных
        if ($request->has('name')) {
            $name = $request->input('name');
        }

        // Получение всех данных формы
        $allData = $request->all();

        // Получение только определенных полей
        $onlyData = $request->only([
            'name',
            'first_name',
            'email',
            'login',
        ]);

        // Исключение определенных полей
        $exceptData = $request->except([
            '_token',
            'password',
            'password_confirmation',
            'avatar',
            'cover',
            'doc',
        ]);

        // Получение вложенных данных
        $userName = $request->input('user.name');
        $userSurname = $request->input('user.surname');

        // Проверка заполненности необязательного поля
        $hasNote = $request->filled('note');

        // Правила валидации
        $rules = [
            // Обязательные поля и типы
            'name' => 'required|string|min:2|max:100',
            'first_name' => 'required|string|alpha',
            'age' => 'required|integer|between:18,100',
            'price' => 'required|numeric|between:1,9999',

            // Email и логин
            'email' => 'bail|required|email|unique:users,email',
            'login' => [
                'required',
                'alpha_num',
                'regex:/^[a-z]+$/',
            ],

            // Строки и размеры
            'title' => 'required|string|min:5|max:100',
            'code' => 'required|string|size:4',
            'pin' => 'required|digits:6',
            'year' => 'required|digits:4',

            // URL
            'website' => 'required|url',
            'slug' => 'required|alpha_dash',

            // Необязательные данные
            'note' => 'nullable|string|max:500',

            // Даты
            'birthday' => 'required|date',
            'deadline' => 'required|date|after:today',
            'start_at' => 'required|date|before:end_at',
            'end_at' => 'required|date',

            // Список допустимых значений
            'status' => 'required|in:draft,published',
            'role' => 'required|in:user,admin',

            // Чекбоксы
            'terms' => 'accepted',
            'is_active' => 'required|boolean',

            // Пароль и подтверждение
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->numbers(),
            ],

            // Регулярное выражение для телефона
            'phone' => 'required|regex:/^[0-9]+$/',

            // Массивы
            'tags' => 'required|array',
            'tags.*' => 'string|max:30',
            'roles' => 'required|array|max:3',
            'roles.*' => 'in:user,admin,editor',

            // Проверка существования записи
            'author_id' => 'required|exists:users,id',

            // Загрузка аватара
            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,png',
                'dimensions:max_width=500,max_height=500',
            ],

            // Загрузка обложки
            'cover' => [
                'nullable',
                'image',
                'dimensions:min_width=800',
            ],

            // Необязательный PDF-документ
            'doc' => 'nullable|file|mimes:pdf',

            // Условная проверка
            'type' => 'required|in:person,business',
            'company' => 'required_if:type,business|string|nullable',

            // sometimes: проверять телефон только если он передан
            'optional_phone' => 'sometimes|string|max:20',

            // Минимальная и максимальная цена
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:0',
        ];

        // Создаем валидатор
        $validator = Validator::make($request->all(), $rules);

        // Задание 230: собственная проверка
        $validator->after(function ($validator) use ($request) {

            if (
                is_numeric($request->input('min_price')) &&
                is_numeric($request->input('max_price')) &&
                $request->input('min_price') > $request->input('max_price')
            ) {
                $validator->errors()->add(
                    'min_price',
                    'Минимальная цена не может быть больше максимальной!'
                );
            }

        });

        // Запускаем проверку
        $validated = $validator->validate();

        // Получаем проверенные данные
        $validatedData = $validated;

        // Сохранение пользователя в БД
        // Используем стандартную таблицу users Laravel

        DB::table('users')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Сохранение загруженных файлов
        $files = [];

        if ($request->hasFile('avatar')) {
            $files['avatar'] = $request->file('avatar')
                ->store('avatars', 'public');
        }

        if ($request->hasFile('cover')) {
            $files['cover'] = $request->file('cover')
                ->store('covers', 'public');
        }

        if ($request->hasFile('doc')) {
            $files['doc'] = $request->file('doc')
                ->store('documents', 'public');
        }

        // Подготавливаем данные для вывода
        $submittedData = [
            'Все данные' => $exceptData,
            'Выбранные поля' => $onlyData,
            'Имя из вложенного массива' => $userName,
            'Фамилия из вложенного массива' => $userSurname,
            'Есть необязательная заметка' => $hasNote ? 'Да' : 'Нет',
            'Проверенные данные' => $validatedData,
            'Загруженные файлы' => $files,
        ];

        return view('work', [
            'result' => 'Пользователь успешно сохранен! Все проверки пройдены.',
            'submittedData' => $submittedData,
            'routeResult' => null,
        ]);
    }

    // Задание 200: внедрение Request и параметры маршрута
    public function routeExample(Request $request, $id, $login)
    {
        $routeResult = [
            'ID пользователя' => $id,
            'Логин из маршрута' => $login,
            'Данные формы' => $request->all(),
        ];

        return view('work', [
            'result' => null,
            'submittedData' => [],
            'routeResult' => $routeResult,
        ]);
    }
}
