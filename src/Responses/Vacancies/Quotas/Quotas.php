<?php

declare(strict_types=1);

namespace Huntflow\Responses\Vacancies\Quotas;

use Huntflow\Responses\Paginate;

final class Quotas extends Paginate
{
    /**
     * @var Quota[]
     */
    public array $items;
}
