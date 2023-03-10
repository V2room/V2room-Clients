<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'feed_comments';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();
        $table->foreignIdFor(\V2room\Models\Feeds\Feed::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');
        $table->foreignIdFor(\V2room\Models\Users\User::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');

        $table->text('contents')->nullable(false)->comment('내용');
    }

};
