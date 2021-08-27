<?php

declare(strict_types=1);

namespace Huntflow\Requests;

class Paginate extends AbstractRequest
{
    public int $count;

    public int $page;

    public function __construct(int $count, int $page)
    {
        $this->count = $count;
        $this->page = $page;
    }
}
