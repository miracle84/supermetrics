<?php

namespace Service\DataProvider\Facade;

/**
 * Interface ApiFacadeInterface
 * @package Service\DataProvider\Facade
 */
interface ApiFacadeInterface
{
    public function getPostList(int $pageCount): ?array;
}