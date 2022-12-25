<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_sources', function (Blueprint $table) {
            $table->string('name',255)
                ->default('')
                ->comment('наименование источника новости');
            $table->string('avatar', 255)->default('')->comment('Ссылка на аватар');
            $table->string('link',255)
                ->default('')
                ->comment('ссылка на портал новостей');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name', 'avatar' , 'link']);
        });
    }
};
