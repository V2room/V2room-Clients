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
        $table->string('content', 512)->nullable(false)->comment('내용');
        $table->foreignIdFor(\App\Models\Room\RoomStatus::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');
    }
};
