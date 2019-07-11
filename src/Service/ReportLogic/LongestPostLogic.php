<?php

namespace Service\ReportLogic;

use Entity\ReportData;

/**
 * Class LongestPostLogic
 * @package Service\ReportLogic
 *
 * Longest post by character length / month
 */
class LongestPostLogic extends BasePostReportLogic
{
    const HEADER_LIST = ["Post ID", "Max length", "Month"];

    public function getReportData(): ReportData
    {
        $postList = $this->getPostList();
        $result = [];
        $rawData = [];

        foreach ($postList as $post) {
            $yearMonth = mb_substr($post->created_time, 0, 7);

            if (empty($rawData[$yearMonth]) || mb_strlen($rawData[$yearMonth]->message) < mb_strlen($post->message)) {
                $rawData[$yearMonth] = $post;
            }
        }

        foreach ($rawData as $yearMonth => $post) {
            $result[] = [$post->id, mb_strlen($post->message), date("M/Y", strtotime($post->created_time))];
        }

        return new ReportData(self::HEADER_LIST, $result);
    }
}