<?php

namespace App\Enum\Room;

enum RoomStatus: string
{
    case wait = '대기중';
    case active = '운영중';
    case paused = '일시중지';
    case closed = '닫힘';
}