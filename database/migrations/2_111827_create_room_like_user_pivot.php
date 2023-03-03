<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * room 을 like, dislike 한 user 정보
 *
 * @author  WilsonParker
 * @added   2023/02/11
 * @updated 2023/02/11
 */
return new class extends \LaravelSupports\Libraries\Supports\Databases\Migrations\CreateMigration {
    protected string $table = 'room_like_user_pivot';

    /**
     * Run the migrations.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function defaultUpTemplate(Blueprint $table): void
    {
        $table->id();

        $this->foreignCode($table, 'status', \V2room\Models\Common\LikeStatus::class)
             ->onUpdate('cascade')
             ->onDelete('cascade');

        $table->foreignIdFor(\V2room\Models\Rooms\Room::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');

        $table->foreignIdFor(\V2room\Models\Users\User::class)
              ->constrained()
              ->onUpdate('cascade')
              ->onDelete('cascade');

        $table->unique(['room_id', 'user_id']);
    }

};
