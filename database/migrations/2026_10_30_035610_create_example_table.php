<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    Откат миграций в Laravel

        php artisan migrate:rollback
        позволяет откатить последнюю отправленную пачку миграций

        php artisan migrate:rollback --step=5
        позволяет сделать откат определенного числа миграций,
        указав параметр step. (step=5 - откат последних пяти миграций)

        php artisan migrate:reset
        данная команда отменит изменения всех миграций
        вашего приложения

        php artisan migrate:refresh
        позволяет откатить все миграции, а затем выполнит их снова

        php artisan migrate:fresh
        удаляет все таблицы и заново запускает миграции

        php artisan migrate
        создает миграции
    */
    /*
    Структура миграций

        Класс миграции содержит два метода: метод up и метод down. Метод up
        используется для добавления новых таблиц, столбцов или индексов в вашу базу данных,
        тогда как метод down, должен отменять операции, выполняемые методом up.
    */

    public function up(): void
    {
        return;

        Schema::create('example', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT UNSIGNED BIGINT (primary key)

            // строковые типы
            $table->string('name'); // varchar(255)
            $table->string('username', 50)->unique(); // varchar(50) с уникальностью
            $table->char('currency', 3); // CHAR(3) - тип char с фикс. длиной - удобен для значения валют (RUB, EUR, USD)
            $table->text('description')->nullable(); // TEXT - до 65КБ, может быть пустым (значение null)
            $table->mediumText('bio')->nullable(); // MediumText - до 16МБ, может быть пустым
            $table->longText('full_profile')->nullable(); // LongText - до 4ГБ, может быть пустым

            // числовые типы
            $table->tinyInteger('age')->nullable(); // tinyint - малое число, от -128 до 127
            $table->integer('amount')->default(0); // число int, по умолчанию 0
            $table->bigInteger('count'); // число BIGINT
            $table->decimal('price', 8, 2); // исп-ся для денег, decimal(8, 2), 8 чисел до запятой, 2 числа после запятой
            $table->double('price', 8, 2); // double(8, 2), 8 чисел до запятой, 2 числа после запятой
            $table->float('price', 8, 2); // float(8, 2) - приблизительное число,
            // 8 чисел до запятой, 2 числа после запятой
            $table->unsignedInteger('int'); // если необходимо добавить свойство unsigned

            // дата и время
            $table->date('birth_date'); // DATE - дата
            $table->time('birth_date'); // TIME - время
            $table->dateTime('birth'); // DATETIME - дата и время
            $table->timestamps();  // created_at и updated_at - информация, когда была создана данная таблица и когда была обновлена
            $table->softDeletes(); // deleted_at - информация, когда она была удалена

            // логические значения
            $table->boolean('is_active')->default(true); // 1 - является
            $table->boolean('is_admin')->default(false); // 0 - не является

            // ENUM
            $table->enum('is_admin', ['admin', 'moderator', 'user', 'manager'])->default('user');
            // ENUM - ограничивает значения только перечисленным списком

            // связи
            $table->foreignId('team_id')->constrained()->onDelete('cascade'); // базовая настройка связи
            // преимущественно, будем использовать ее
            // constrained - используется в миграциях для создания внешнего ключа с автоматическим определением целевой таблицы и столбца
            // метод применяется к определению поля foreignId и упрощает создание внешних ключей
            // автоматически определяет таблицу и столбец, на которые ссылается внешний ключ, на основе названия поля
            $table->foreignId('team_id')->constrained()->onDelete('cascade')->onUpdate('cascade'); // update(cascade) - обновление(каскадно)
            // ('set null') - при удалении родительской записи значение внешнего ключа в дочерней устанавливается в NULL
            // ('restrict') - блокирует удаление родительской записи, если на нее еще ссылаются элементы
            // ('no action') - оставить "без действия"
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained(); // nullable - принимает значение null

            // специальные типы
            $table->rememberToken(); // varchar(100) - токен, для реализации функции "Запомнить меня" при авторизации
            $table->binary('avatar')->nullable(); // BLOB - используется для хранения картинок, файлов, зашифрованных ключей
            $table->json('options'); // для хранения структированных данных в формате JSON
            // Модификаторы полей
            $table->string('name')
                ->nullable() // разрешить значение NULL
                ->default('John') // John - значение по умолчанию
                ->unique() // Данное поле имеет уникальное значение
                ->index() // Обычный индекс
                ->primary() // Первичный ключ
                ->after('email') // ввести после поля email
                ->first() // ввести первым полем  в таблице
                ->comment('Имя пользователя') // комментарий в поле в БД
                ->always() // всегда вычислять
                ->unsigned() // беззнаковое значение (для чисел)
                ->change(); // изменить существующее поле
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        return;
        // Удалить, если существует таблица с данным именем
        Schema::dropIfExists('example');
    }
};
