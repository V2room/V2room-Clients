<?php

namespace App\Models\Rooms;

use App\Models\BaseModel;

class Room extends BaseModel
{
    protected $table = 'rooms';

    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(RoomStatus::class);
    }

    public function topics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Topic::class);
    }

}
