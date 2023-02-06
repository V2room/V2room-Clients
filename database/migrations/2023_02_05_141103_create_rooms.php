<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration
{
    protected string $table = 'rooms';

    protected function defaultUpTemplate(Blueprint $table)
    {
        $table->id();
        $table->timestamps();
    }
};
