<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesAndFavsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('favs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('link');
            $table->string('description');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('favs');
        Schema::drop('categories');
    }
}
