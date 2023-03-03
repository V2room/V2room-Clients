<?php

use Illuminate\Database\Schema\Blueprint;
use LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration;

return new class extends CreateMigration
{

    protected string $table = "exception_logs";

    protected function defaultUpTemplate(Blueprint $table)
    {
        $table->id('idx')->comment('고유키');
        $table->string('code', 256)->nullable(false)->comment('에러 코드');
        $table->text('message')->nullable(false)->comment('에러 메시지');
        $table->string('url', 512)->nullable(false)->comment('에러가 발생한 주소');
        $table->string('file', 512)->nullable(false)->comment('에러가 발생한 파일 이름');
        $table->string('class', 512)->nullable(false)->comment('에러가 발생한 클래스');
        $table->text('trace')->nullable(false)->comment('에러 내용');
    }
};
