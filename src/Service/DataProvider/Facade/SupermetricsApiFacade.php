<?php

namespace Service\DataProvider\Facade;

use Exception;
use Service\DataProvider\SupermetricsApi;

/**
 * Class SupermetricsApiFacade
 * @package Service\DataProvider\Facade
 *
 * Facade for work with SupermetricsApi - to simplify work with it
 */
class SupermetricsApiFacade implements ApiFacadeInterface
{
    /** @var SupermetricsApi */
    private $supermetricsApi;

    /**
     * SupermetricsApiFacade constructor.
     * @param SupermetricsApi $supermetricsApi
     */
    public function __construct(SupermetricsApi $supermetricsApi)
    {
        $this->supermetricsApi = $supermetricsApi;
    }

    /**
     * @param int $pageCount
     *
     * @return array|null
     * @throws Exception
     */
    public function getPostList(int $pageCount = 10): ?array
    {
        $slToken = $this->supermetricsApi->getSlToken();

        $postList = [];

        for ($page = 1; $page <= $pageCount; ++$page) {
            $postPerPage = $this->supermetricsApi->getPostListPerPage($slToken, $page);
            $postList = array_merge($postList, $postPerPage);
        }

        return $postList;
    }
}