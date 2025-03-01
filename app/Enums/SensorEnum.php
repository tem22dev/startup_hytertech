<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SensorEnum extends Enum
{
    public const PH = 1;
    public const EC = 2;
    public const MOTOR = 4;
    public const LED_IN = 5;
    public const LED_OUT = 6;
}
