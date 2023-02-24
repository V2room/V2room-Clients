<?php

namespace App\Models\Rooms;

use App\Models\BaseModel;
use App\Models\Users\User;

class Room extends BaseModel
{
    protected $table = 'rooms';
    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(RoomStatus::class);
    }

    public function topics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Topic::class);
    }

}
