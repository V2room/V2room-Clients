<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * room 상태
 *
 * @author  WilsonParker
 * @added   2023/02/10
 * @updated 2023/02/10
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration
{
    protected string $table = 'room_status';

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
