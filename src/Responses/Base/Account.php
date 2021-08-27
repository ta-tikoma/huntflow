<?php

declare(strict_types=1);

namespace Huntflow\Responses\Base;

use Huntflow\Ids\AccountId;

class Account
{
    public AccountId $id;

    public string $name;

    public string $nick;

    public string $member_type;
}
