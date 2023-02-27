<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * room 주제에 대한 의견
 *
 * @author  WilsonParker
 * @added   2023/02/10
 * @updated 2023/02/10
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'topic_opinions';

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
        $table->unsignedInteger('agree_count')->nullable(false)->default(0)->comment('동의 수');

        $table->foreignIdFor(\V2room\Models\Rooms\Topic::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');
    }

};
