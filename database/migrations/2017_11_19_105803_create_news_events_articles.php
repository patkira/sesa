<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsEventsArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NewsEventsArticles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hash', 80)->unique();
            $table->string('title', 150);
            $table->text('summary');
            $table->longtext('content');
            $table->enum('priority', ['high', 'normal']);
            $table->text('location');
            $table->timestamp('event_start');
            $table->timestamp('event_end');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('Categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('NewsEventsArticles');
    }
}
