<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('text');
            $table->integer('likes');
            $table->timestamps();

            /*
            $table->integer('age')
                ->unsigned()
                ->default(1)
                ->comment('my comment');
            $table->boolean('gender');
            $table->string('comment');
            $table->string('name');
            $table->string('title', 100)->change();


            $table->renameColumn('age', 'vozrast'); // Переименование поля

            $table->id();
            $table->string('name');
            $table->text('text');
            $table->timestamps();
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->renameColumn('vozrast', 'age'); // Возвращение названия поля
        });
        Schema::dropIfExists('posts');
    }
};
