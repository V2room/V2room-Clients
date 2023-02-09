<?php

use Illuminate\Database\Schema\Blueprint;

return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'user_information';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();
        $table->foreignIdFor(\App\Models\User\User::class);
        $table->string('contact', 32)->nullable(false)->comment('연락처');
        $table->string('birth', 6)->nullable(false)->comment('생년월일');
        $table->enum('gender', ['female', 'male'])->nullable(false)->comment('성별');
    }

};
