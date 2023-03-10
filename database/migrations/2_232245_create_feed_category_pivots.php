<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration
{
    protected string $table = 'feed_category_pivots';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
     protected function defaultUpTemplate(Blueprint $table): void
     {
         $table->id();
         $table->string('code', 32)->nullable(false)->comment('코드');
     }

};
