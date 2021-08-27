<?php

declare(strict_types=1);

namespace Huntflow\Responses\Vacancies;

use DateTimeImmutable;
use Huntflow\Enums\Priority;
use Huntflow\Enums\VacancyState;
use Huntflow\Ids\VacancyId;

final class VacancyItem
{
    public VacancyId $id;

    public string $position;

    public string $company;

    public string $money;

    public ?DateTimeImmutable $deadline;

    public Priority $priority;

    public bool $hidden;

    public VacancyState $state;
}
