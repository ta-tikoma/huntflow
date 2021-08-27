<?php

declare(strict_types=1);

namespace Huntflow;

use Huntflow\Ids\AccountId;
use Huntflow\Services\BaseService;
use Huntflow\Services\VacanciesService;

class HuntflowAPI
{
    protected HuntflowClient $client;

    public function __construct(
        HuntflowClient $client
    ) {
        $this->client = $client;
    }

    public function base(): BaseService
    {
        return new BaseService($this->client);
    }

    public function vacancies(AccountId $accountId): VacanciesService
    {
        return new VacanciesService($this->client, $accountId);
    }
}
