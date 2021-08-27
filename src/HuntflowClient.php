<?php

declare(strict_types=1);

namespace Huntflow;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use Huntflow\Requests\AbstractRequest;
use Huntflow\Requests\Paginate;
use JsonMapper;

class HuntflowClient
{
    /**
     * Will be send in User-Agent
     */
    protected string $appName;

    /**
     * Will be send in User-Agent
     */
    protected string $contactEmail;

    /**
     * For Bearer authorization
     */
    protected string $token;

    protected string $baseUrl = 'https://api.huntflow.ru/';

    protected Client $client;

    protected JsonMapper $mapper;

    public function __construct(
        string $appName,
        string $contactEmail,
        string $token
    ) {
        $this->appName      = $appName;
        $this->contactEmail = $contactEmail;
        $this->token        = $token;

        $this->client = new Client([
            'base_uri' => $this->baseUrl
        ]);
        $this->mapper = new JsonMapper();
        $this->mapper->bEnforceMapType = false;
    }

    public function request(string $method, string $url, array $options = []): array
    {
        $response = $this->client->request($method, $url, $options);

        $json = json_decode((string) $response->getBody(), true);

        return $json;
    }

    public function upload(
        string $url,
        string $path,
        array $headers = [],
        string $responseClass
    ): object {
        $json = $this->request('POST', $url, [
            'multipart' => [
                'name' => 'file',
                'contents' => Utils::tryFopen($path, 'r')
            ],
            'headers' => $headers
        ]);

        return $this->mapper->map($json, new $responseClass());
    }

    public function get(string $url, string $responseClass): object
    {
        $json = $this->request('GET', $url);

        return $this->mapper->map($json, new $responseClass());
    }

    public function getList(string $url, string $responseClass): array
    {
        $json = $this->request('GET', $url);

        return $this->mapper->mapArray($json, [], new $responseClass());
    }

    public function getPaginatedList(
        string $url,
        Paginate $paginate,
        string $responseClass,
        $prefix = null
    ): object {
        $json = $this->request('GET', $url, $paginate->toOptions());

        if ($prefix !== null) {
            $json = $json[$prefix];
        }

        return $this->mapper->map($json, new $responseClass());
    }

    public function post(string $url, AbstractRequest $request, string $responseClass): object
    {
        $json = $this->request('POST', $url, $request->toOptions());

        return $this->mapper->map($json, new $responseClass());
    }

    public function put(string $url, AbstractRequest $request, string $responseClass): object
    {
        $json = $this->request('PUT', $url, $request->toOptions());

        return $this->mapper->map($json, new $responseClass());
    }

    public function delete(string $url, string $responseClass): object
    {
        $json = $this->request('DELETE', $url);

        return $this->mapper->map($json, new $responseClass());
    }
}
