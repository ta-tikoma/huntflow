<?php

declare(strict_types=1);

namespace Huntflow\Requests\Vacancies;

use DateTimeImmutable;
use Huntflow\Ids\QuotaId;
use Huntflow\Ids\RequestId;

final class Quota
{
    public ?QuotaId $id;

    public DateTimeImmutable $deadline;

    public int $applicants_to_hire;

    public RequestId $vacancy_request;
}
