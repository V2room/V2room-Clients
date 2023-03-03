<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * topic opinion 의 comment
 *
 * @author  WilsonParker
 * @added   2023/02/11
 * @updated 2023/02/11
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'topic_opinion_comments';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();
        $table->text('content')->nullable(false)->comment('내용');

        $table->foreignIdFor(\V2room\Models\Rooms\TopicOpinion::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');
    }

};
