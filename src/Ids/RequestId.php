<?php

declare(strict_types=1);

namespace Huntflow\Ids;

use Huntflow\Contracts\ToOptionContract;

final class RequestId implements ToOptionContract
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function toOptions()
    {
        return $this->value;
    }
}
