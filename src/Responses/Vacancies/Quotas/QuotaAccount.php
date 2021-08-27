<?php

declare(strict_types=1);

namespace Huntflow\Responses\Vacancies\Quotas;

use Huntflow\Ids\AccountId;

final class QuotaAccount
{
    public AccountId $id;

    public string $email;

    public string $name;
}
