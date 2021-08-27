<?php

declare(strict_types=1);

namespace Huntflow\Requests;

use DateTimeImmutable;
use Huntflow\Contracts\ToOptionContract;

abstract class AbstractRequest implements ToOptionContract
{
    private const DATE_TIME_FORMAT = '';

    public function toOptions()
    {
        return array_map('self::toOption', get_object_vars($this));
    }

    private static function toOption($value)
    {
        switch (true) {
            case $value instanceof ToOptionContract:
                return $value->toOptions();
            case $value instanceof DateTimeImmutable:
                return $value->format(self::DATE_TIME_FORMAT);
            case is_array($value):
                return array_map('self::toOption', $value);
        }

        return $value;
    }
}
