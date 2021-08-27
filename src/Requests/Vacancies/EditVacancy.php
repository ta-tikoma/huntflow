<?php

declare(strict_types=1);

namespace Huntflow\Requests\Vacancies;

use Huntflow\Enums\Priority;
use Huntflow\Enums\VacancyState;
use Huntflow\Ids\FileId;
use Huntflow\Requests\AbstractRequest;

final class EditVacancy extends AbstractRequest
{
    public string $position;

    public ?string $company;

    public ?string $money;

    public ?Priority $priority;

    public ?int $account_division;

    public ?array $coworkers;

    public ?string $body;

    public ?string $requirements;

    public ?string $conditions;

    public ?bool $hidden;

    public ?VacancyState $state;

    /**
     * @var FileId[]
     */
    public ?array $files;

    /**
     * @var Quota[]
     */
    public ?array $fill_quotas;
}
