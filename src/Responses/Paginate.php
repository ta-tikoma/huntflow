<?php

declare(strict_types=1);

namespace Huntflow\Responses;

abstract class Paginate
{
    public int $total;

    public int $page;

    public int $count;
}
