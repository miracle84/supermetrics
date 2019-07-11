<?php

namespace Service\ReportLogic;

use Entity\ReportData;

/**
 * Class AverageLengthPostLogic
 * @package Service\ReportLogic
 *
 * Average character length / post / month
 */
class AverageLengthPostLogic extends BasePostReportLogic
{
    const HEADER_LIST = ["Month", "Average length"];

    public function getReportData(): ReportData
    {
        $postList = $this->getPostList();
        $result = [];
        $rawData = [];

        foreach ($postList as $post) {
            $yearMonth = mb_substr($post->created_time, 0, 7);

            if (empty($rawData[$yearMonth])) {
                $rawData[$yearMonth]['length'] = 0;
                $rawData[$yearMonth]['count'] = 0;
            }

            $rawData[$yearMonth]['length'] += mb_strlen($post->message);
            $rawData[$yearMonth]['count'] += 1;
        }

        foreach ($rawData as $yearMonth => $data) {
            $result[] = [
                date("M/Y", strtotime($yearMonth . '-01')),
                number_format($data['length'] / $data['count'], 2)
            ];
        }

        return new ReportData(self::HEADER_LIST, $result);
    }
}