<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'topics';

    protected function defaultUpTemplate(Blueprint $table)
    {
        $table->id();
        $table->string('content', 512)->nullable(false)->comment('내용');
        $table->foreignIdFor('');
    }
};
