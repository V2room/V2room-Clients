<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * user 정보
 *
 * @author  WilsonParker
 * @added   2023/02/10
 * @updated 2023/02/10
 */
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
        $table->string('contact', 32)->nullable(false)->comment('연락처');
        $table->string('birth', 6)->nullable(false)->comment('생년월일');
        $table->string('age', 3)->nullable(false)->comment('나이 (시스템으로 걔산)');
        $table->enum('gender', ['female', 'male'])->nullable(false)->comment('성별');

        $table->foreignIdFor(\App\Models\Users\User::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');
    }

};
