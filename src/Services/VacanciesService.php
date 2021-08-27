<?php

declare(strict_types=1);

namespace Huntflow\Services;

use Huntflow\HuntflowClient;
use Huntflow\Ids\AccountId;
use Huntflow\Ids\VacancyId;
use Huntflow\Requests\Vacancies\EditVacancy as EditVacancyRequest;
use Huntflow\Requests\Vacancies\Quotas\Quotas as QuotasRequest;
use Huntflow\Requests\Vacancies\Vacancies as VacanciesRequest;
use Huntflow\Responses\Status;
use Huntflow\Responses\Vacancies\EditVacancy as EditVacancyResponse;
use Huntflow\Responses\Vacancies\Quotas\Quotas as QuotasResponse;
use Huntflow\Responses\Vacancies\Vacancies as VacanciesResponse;
use Huntflow\Responses\Vacancies\Vacancy;

final class VacanciesService
{
    private HuntflowClient $client;

    private AccountId $accountId;

    public function __construct(
        HuntflowClient $client,
        AccountId $accountId
    ) {
        $this->client = $client;
        $this->accountId = $accountId;
    }

    public function create(EditVacancyRequest $vacancy): EditVacancyResponse
    {
        return $this->client->post(
            "account/{$this->accountId->toOptions()}/vacancies",
            $vacancy,
            EditVacancyResponse::class
        );
    }

    public function update(VacancyId $vacancyId, EditVacancyRequest $vacancy): EditVacancyResponse
    {
        return $this->client->put(
            "account/{$this->accountId->toOptions()}/vacancies/{$vacancyId->toOptions()}",
            $vacancy,
            EditVacancyResponse::class
        );
    }

    public function delete(VacancyId $vacancyId): Status
    {
        return $this->client->delete(
            "account/{$this->accountId->toOptions()}/vacancies/{$vacancyId->toOptions()}",
            Status::class
        );
    }

    public function vacancies(VacanciesRequest $vacancies): VacanciesResponse
    {
        return $this->client->getPaginatedList(
            "account/{$this->accountId->toOptions()}/vacancies/",
            $vacancies,
            VacanciesResponse::class
        );
    }

    public function vacancy(VacancyId $vacancyId): Vacancy
    {
        return $this->client->get(
            "account/{$this->accountId->toOptions()}/vacancies/{$vacancyId->toOptions()}",
            Vacancy::class
        );
    }

    public function quotas(VacancyId $vacancyId, QuotasRequest $quotas): QuotasResponse
    {
        return $this->client->getPaginatedList(
            "account/{$this->accountId->toOptions()}/vacancies/{$vacancyId->toOptions()}/quotas",
            $quotas,
            QuotasResponse::class,
            (string) $vacancyId->toOptions()
        );
    }
}
