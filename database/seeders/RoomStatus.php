<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->insert('wait', '대기중');
        $this->insert('active', '운영중');
        $this->insert('paused', '일시중지');
        $this->insert('closed', '닫힘');
    }

    private function insert(string $code, string $description): void
    {
        \App\Models\Rooms\RoomStatus::create([
            'code' => $code,
            'description' => $description,
        ]);
    }
}
