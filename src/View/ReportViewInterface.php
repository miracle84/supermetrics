<?php

namespace View;

use Entity\ReportData;

/**
 * Interface ReportViewInterface
 * @package View
 */
interface ReportViewInterface
{
    /**
     * @param ReportData $report
     *
     * @return string
     */
    public function render(ReportData $report): string;
}