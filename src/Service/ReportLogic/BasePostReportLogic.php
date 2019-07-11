<?php

namespace Service\ReportLogic;

abstract class BasePostReportLogic implements ReportLogicInterface
{
    /** used simple array instead array of specific object, for optimization.
     * To avoid creation list of those objects(only use what we have from API)
     * It's only for explanation.
     */
    /** @var array */
    private $postList;
    /**
     * @return mixed
     */
    public function getPostList()
    {
        return $this->postList;
    }

    /**
     * @param mixed $postList
     */
    public function setPostList($postList): void
    {
        $this->postList = $postList;
    }
}