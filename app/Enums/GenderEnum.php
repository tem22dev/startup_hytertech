<?php

namespace App\Enums;

enum GenderEnum: int
{
    case MALE = 1;
    case FEMALE = 2;

    public static function getValues()
    {
        return [
            self::MALE->value => GenderStringEnum::MALE_STRING->value,
            self::FEMALE->value => GenderStringEnum::FEMALE_STRING->value,
        ];
    }
}

enum GenderStringEnum: string
{
    case MALE_STRING = 'Nam';
    case FEMALE_STRING = 'Nữ';
}