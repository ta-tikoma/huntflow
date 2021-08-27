<?php

declare(strict_types=1);

namespace Huntflow\Responses\Vacancies\Quotas;

use DateTimeImmutable;
use Huntflow\Ids\QuotaId;
use Huntflow\Ids\RequestId;

final class Quota
{
    public QuotaId $id;

    public ?DateTimeImmutable $deadline;

    public int $applicants_to_hire;

    public ?RequestId $vacancy_request;

    public DateTimeImmutable $created;

    public ?DateTimeImmutable $closed;

    public int $already_hired;

    public QuotaAccount $account_info;
}
