<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration
{
    protected string $table = 'topic_opinions';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
     protected function defaultUpTemplate(Blueprint $table): void
     {
         $table->id();
         $table->foreignIdFor(\App\Models\Room\Topic::class);
     }

};
