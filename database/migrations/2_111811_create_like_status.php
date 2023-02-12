<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * room, comment 등 like, dislike... status 정보
 *
 * @author  WilsonParker
 * @added   2023/02/11
 * @updated 2023/02/11
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'like_status';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->string('code', 32)->primary();
        $table->string('description', 256)->nullable(false)->comment('설명');
    }

};
