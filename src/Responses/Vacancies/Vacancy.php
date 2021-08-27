<?php

declare(strict_types=1);

namespace Huntflow\Responses\Vacancies;

use DateTimeImmutable;
use Huntflow\Enums\Priority;
use Huntflow\Enums\VacancyState;
use Huntflow\Ids\VacancyId;

final class Vacancy
{
    public VacancyId $id;

    public string $position;

    public string $company;

    public string $money;

    public DateTimeImmutable $deadline;

    public int $applicants_to_hire;

    public DateTimeImmutable $created;

    public Priority $priority;

    public bool $hidden;

    public VacancyState $state;

    public string $body;

    public string $requirements;

    public string $conditions;

    /**
     * @var \Huntflow\Responses\Files\File[]
     */
    public array $files;
}
