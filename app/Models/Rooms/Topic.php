<?php

namespace App\Models\Rooms;

use App\Models\BaseModel;

class Topic extends BaseModel
{
    protected $table = 'topics';

    public function opinions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TopicOpinionComment::class);
    }
}
