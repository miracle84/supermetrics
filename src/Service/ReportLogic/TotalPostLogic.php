<?php

namespace Service\ReportLogic;

use DateTime;
use Entity\ReportData;

/**
 * Class TotalPostLogic
 * @package Service\ReportLogic
 *
 * Total posts split by week
 */
class TotalPostLogic extends BasePostReportLogic
{
    const HEADER_LIST = ["Week / Year", "Total posts"];

    public function getReportData(): ReportData
    {
        $postList = $this->getPostList();
        $result = [];
        $rawData = [];

        foreach ($postList as $post) {
            $createDate = (new DateTime($post->created_time));
            $weekYear = $createDate->format('W') . ' / ' . $createDate->format('Y');
            $rawData[$weekYear] = empty($rawData[$weekYear]) ? 1 : ++$rawData[$weekYear];
        }

        foreach ($rawData as $weekYear => $totalPostCount) {
            $result[] = [$weekYear, $totalPostCount];
        }

        return new ReportData(self::HEADER_LIST, $result);
    }
}