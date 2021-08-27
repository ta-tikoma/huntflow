<?php

declare(strict_types=1);

namespace Huntflow\Responses\Files;

final class ParsedFile extends File
{
    public string $text;

    public array $photo;

    public array $fields;
}
