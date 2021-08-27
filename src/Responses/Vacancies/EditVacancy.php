<?php

declare(strict_types=1);

namespace Huntflow\Responses\Vacancies;

use DateTimeImmutable;
use Huntflow\Ids\VacancyId;

final class EditVacancy
{
    public VacancyId $id;

    public DateTimeImmutable $created;
}
