<?php

declare(strict_types=1);

namespace Huntflow\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static self OPEN() Вакансия открыта
 * @method static self CLOSED() Вакансия закрыта
 * @method static self HOLD() Работа над вакансией приостановлена
 */
final class VacancyState extends Enum
{
    private const OPEN   = 'OPEN';
    private const CLOSED = 'CLOSED';
    private const HOLD   = 'HOLD';
}
