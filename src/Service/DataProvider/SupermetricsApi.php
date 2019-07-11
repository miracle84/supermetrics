<?php

namespace Service\DataProvider;

use Exception;
use My\HttpClient\HttpClient;

class SupermetricsApi implements DataProviderInterface
{
    const REGISTER_URL = 'https://api.supermetrics.com/assignment/register';
    const POST_URL = 'https://api.supermetrics.com/assignment/posts';
    /** @var string */
    private $clientId;
    /** @var string */
    private $email;
    /** @var string */
    private $name;
    /** @var HttpClient */
    private $httpClient;

    /**
     * SupermetricsApi constructor.
     * @param HttpClient $httpClient
     * @param string $clientId
     * @param string $email
     * @param string $name
     *
     * Suggestion, that we will use same credential for different reports
     * Another, we must move initialization $email and $name to separated method
     */
    public function __construct(HttpClient $httpClient, string $clientId, string $email, string $name)
    {
        $this->clientId = $clientId;
        $this->email = $email;
        $this->name = $name;
        $this->httpClient = $httpClient;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getSlToken(): string
    {
        $result = $this->httpClient->post(self::REGISTER_URL,
            ['client_id' => $this->clientId, 'email' => $this->email, 'name' => $this->name]
        );

        $slToken = (string)json_decode($result)->data->sl_token;

        if (empty($slToken)) {
            throw new Exception('sl_token can\'t be empty');
        }

        return $slToken;
    }

    /**
     * @param string $slToken
     * @param int $page
     *
     * @return array|null
     */
    public function getPostListPerPage(string $slToken, int $page = 1): ?array
    {
        $result = $this->httpClient->get(self::POST_URL, ['sl_token' => $slToken, 'page' => $page]);

        return json_decode($result)->data->posts;
    }
}