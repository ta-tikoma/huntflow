<?php

declare(strict_types=1);

namespace Huntflow\Services;

use Huntflow\HuntflowClient;
use Huntflow\Responses\Base\Accounts;
use Huntflow\Responses\Base\Me;

final class BaseService
{
    protected HuntflowClient $client;

    public function __construct(
        HuntflowClient $client
    ) {
        $this->client = $client;
    }

    public function me(): Me
    {
        return $this->client->get('me', Me::class);
    }

    public function accounts(): Accounts
    {
        return $this->client->get('accounts', Accounts::class);
    }
}
