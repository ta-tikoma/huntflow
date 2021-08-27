<?php

declare(strict_types=1);

namespace Huntflow\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static self NORMAL() обычный
 * @method static self HIGHT() высокий
 */
final class Priority extends Enum
{
    private const NORMAL = 0;
    private const HIGHT  = 1;
}
