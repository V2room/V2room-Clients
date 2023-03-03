<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * topic opinion comment 을 like, dislike 하는 user 정보
 *
 * @author  WilsonParker
 * @added   2023/02/11
 * @updated 2023/02/11
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'topic_opinion_comment_like_user_pivot';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();

        $this->foreignCode($table, 'status', \V2room\Models\Common\LikeStatus::class)
             ->onUpdate('cascade')
             ->onDelete('cascade');

        $this->foreignIdForWithName($table, \V2room\Models\Rooms\TopicOpinionComment::class, 'comment')
             ->onUpdate('cascade')
             ->onDelete('cascade');

        $this->foreignIdForWithName($table, \V2room\Models\Users\User::class, 'user')
             ->onUpdate('cascade')
             ->onDelete('cascade');

        $table->unique(['topic_opinion_comment_id', 'user_id'], 'topic_opinion_comment_user_unique');
    }

};
