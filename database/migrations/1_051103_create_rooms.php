<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'rooms';

    protected function defaultUpTemplate(Blueprint $table)
    {
        $table->id();
        $table->timestamp('close_reserved_at');
        $table->timestamp('closed_at');
        $table->foreignIdFor(\App\Models\Room\RoomStatus::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');
    }
};
