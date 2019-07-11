<?php

namespace Service\ReportLogic;

use Entity\ReportData;

/**
 * Class AveragePostLogic
 * @package Service\ReportLogic
 *
 * Report logic for average number of posts per user / month
 */
class AveragePostLogic extends BasePostReportLogic
{
    const HEADER_LIST = ["User", "Average posts / month"];

    public function getReportData(): ReportData
    {
        $postList = $this->getPostList();
        $result = [];
        $rawData = [];

        foreach ($postList as $post) {
            $yearMonth = mb_substr($post->created_time, 0, 7);
            $userName = $post->from_name;
            $rawData[$userName][$yearMonth] = empty($rawData[$userName][$yearMonth])
                ? 1 : ++$rawData[$userName][$yearMonth];
        }

        foreach ($rawData as $userName => $data) {
            $result[] = [$userName, number_format(array_sum($data) / count($data), 2)];
        }

        return new ReportData(self::HEADER_LIST, $result);
    }
}