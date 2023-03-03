<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * room 통계 정보
 *
 * @author  WilsonParker
 * @added   2023/02/10
 * @updated 2023/02/10
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'room_statistics';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();
        $table->unsignedInteger('scrap_count')->comment('스크랩 수');
        $table->unsignedInteger('share_count')->comment('공유 수');
        $table->unsignedInteger('comment_count')->comment('댓글 수');
        $table->unsignedInteger('like_count')->comment('좋아요 수');
        $table->unsignedInteger('dislike_count')->comment('싫어요 수');
        $table->unsignedInteger('view_count')->comment('조회수');

        $table->foreignIdFor(\V2room\Models\Rooms\Room::class)
              ->unique()
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');

    }

};
