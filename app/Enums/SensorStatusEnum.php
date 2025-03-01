<?php

namespace App\Enums;

enum SensorStatusEnum: int
{
    case STOP = 0;
    case ACTIVE = 1;

    public static function getValues()
    {
        return [
            self::STOP->value,
            self::ACTIVE->value,
        ];
    }
}
