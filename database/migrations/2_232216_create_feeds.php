<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'feeds';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();

        $this->foreignCode($table, 'type', \V2room\Models\Feeds\FeedType::class)
             ->onUpdate('cascade')
             ->onDelete('cascade');

        $table->string('title', 256)->nullable(false)->comment('제목');
        $table->text('contents')->nullable(false)->comment('내용');
        $table->string('url', 512)->nullable(false)->comment('URL');
    }

};
