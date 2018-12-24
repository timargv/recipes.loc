<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallMessageCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wall_message_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');

            $table->integer('votes')->nullable()->default(0); // голосов
            $table->integer('spam')->nullable()->default(0);  // спам
            $table->integer('reply_id')->nullable()->default(0); // идентификатор ответа

            $table->integer('wall_message_id');
            $table->text('body', 3000);
            $table->timestamps();
        });

        // комментировать голосование пользователя
        Schema::create('wall_message_comment_user_vote', function (Blueprint $table) {
            $table->integer('comment_id');
            $table->integer('user_id');
            $table->string('vote',11); // голосов
        });


        Schema::create('wall_message_comment_spam', function (Blueprint $table) {
            $table->integer('comment_id');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wall_message_comments');
        Schema::dropIfExists('wall_message_comment_user_vote');
        Schema::dropIfExists('wall_message_comment_spam');
    }
}
