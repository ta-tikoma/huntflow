<?php

declare(strict_types=1);

namespace Huntflow\Responses\Files;

use Huntflow\Ids\FileId;

class File
{
    public FileId $id;

    public string $name;

    public string $content_type;

    public string $url;
}
