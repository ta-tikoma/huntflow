<?php

declare(strict_types=1);

namespace Huntflow\Services;

use Huntflow\HuntflowClient;
use Huntflow\Ids\AccountId;
use Huntflow\Responses\Files\File;
use Huntflow\Responses\Files\ParsedFile;

final class FileService
{
    protected HuntflowClient $client;

    public function __construct(
        HuntflowClient $client,
        AccountId $accountId
    ) {
        $this->client = $client;
        $this->accountId = $accountId;
    }

    public function upload(string $path): File
    {
        return $this->client->upload(
            "account/{$this->accountId->toOptions()}/upload",
            $path,
            [],
            File::class
        );
    }

    public function uploadAndParse(string $path): ParsedFile
    {
        return $this->client->upload(
            "account/{$this->accountId->toOptions()}/upload",
            $path,
            ['X-File-Parse' => true],
            ParsedFile::class
        );
    }
}
