<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * topic opinion 에 동의 한 user 정보
 *
 * @author  WilsonParker
 * @added   2023/02/11
 * @updated 2023/02/11
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'topic_opinion_agree_user_pivot';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();

        $table->foreignIdFor(\V2room\Models\Rooms\TopicOpinion::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');

        $table->foreignIdFor(\V2room\Models\Users\User::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');

        $table->unique(['topic_opinion_id', 'user_id']);
    }

};
