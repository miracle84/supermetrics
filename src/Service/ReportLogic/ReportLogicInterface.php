<?php

namespace Service\ReportLogic;

use Entity\ReportData;

/**
 * Interface ReportLogicInterface
 * @package Service\ReportLogic
 *
 * ReportLogicInterface
 */
interface ReportLogicInterface
{
    public function getReportData(): ReportData;
}