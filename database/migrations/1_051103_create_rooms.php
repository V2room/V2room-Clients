<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * room
 *
 * @author  WilsonParker
 * @added   2023/02/10
 * @updated 2023/02/10
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'rooms';

    protected function defaultUpTemplate(Blueprint $table)
    {
        $table->id();
        $table->string('title', 512)->nullable(false)->comment('주제');
        $table->timestamp('close_reserved_at')->nullable(true)->comment('close 예약 날짜');
        $table->timestamp('closed_at')->nullable(true)->comment('close 날짜');

        $this->foreignCode($table, 'status', \V2room\Models\Rooms\RoomStatus::class)
             ->onUpdate('cascade')
             ->onDelete('cascade');

        $table->foreignIdFor(\V2room\Models\Users\User::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');
    }
};
