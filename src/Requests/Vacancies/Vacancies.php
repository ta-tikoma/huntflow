<?php

declare(strict_types=1);

namespace Huntflow\Requests\Vacancies;

use Huntflow\Requests\Paginate;

final class Vacancies extends Paginate
{
    public ?bool $mine;

    public ?bool $opened;
}
