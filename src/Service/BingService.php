<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BingService
{
    protected const IMAGES_COUNT = 5;
    protected  $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function searchAll(array $query): array
    {
        $urls = [];

        foreach ($query as $tag) {
            $urls = array_merge($urls, $this->search($tag));
        }

        return $urls;
    }

    public function search(string $tag)
    {
        try {
            $response = $this->client->request('GET', '', [
                'query' => [
                    'q' => $tag,
                    'count' => self::IMAGES_COUNT,
                    'offset' => 0,
                    'mkt' => 'ru-ru'
                ]
            ]);
        } catch (GuzzleException $e) {
            return [];
        }

        $response = json_decode($response->getBody(), true);
        $urls = [];

        foreach ($response['value'] as $value)
        {
            $urls[] = $value['contentUrl'];
        }

        return $urls;
    }
}