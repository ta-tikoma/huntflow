<?php

declare(strict_types=1);

namespace Huntflow\Responses\Vacancies;

use Huntflow\Responses\Paginate;

final class Vacancies extends Paginate
{
    /**
     * @var VacancyItem[]
     */
    public array $items;
}
