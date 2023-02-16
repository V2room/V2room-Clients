<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * room 주제
 *
 * @author  WilsonParker
 * @added   2023/02/10
 * @updated 2023/02/10
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'topics';

    protected function defaultUpTemplate(Blueprint $table)
    {
        $table->id();
        $table->string('title', 512)->nullable(false)->comment('제목');
        $table->text('content')->nullable(false)->comment('내용');

        $this->foreignCode($table, 'status', \App\Models\Rooms\RoomStatus::class)
              ->onUpdate('cascade')
              ->onDelete('cascade');
    }
};
