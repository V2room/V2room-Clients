<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration
{
    protected string $table = 'feed_types';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
     protected function defaultUpTemplate(Blueprint $table): void
     {
         $table->string('code', 32)->primary()->nullable(false)->comment('코드');
         $table->string('description', 256)->nullable(false)->comment('설명');
     }

};
