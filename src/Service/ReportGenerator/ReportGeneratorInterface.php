<?php

namespace Service\ReportGenerator;

use Entity\ReportData;
use Report\DataProvider\DataProviderInterface;
use Report\Logic\ReportLogicInterface;

/**
 * Interface ReportGeneratorInterface
 * @package Service\ReportGenerator
 *
 * Interface for report generators
 */
interface ReportGeneratorInterface
{
    public function generate(): ReportData;
}