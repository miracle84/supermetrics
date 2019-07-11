<?php

namespace View;

use Entity\ReportData;

/**
 * Class ReportJsonView
 * @package View
 */
class ReportJsonView implements ReportViewInterface
{
    /**
     * @param ReportData $report
     *
     * @return string
     */
    public function render(ReportData $report): string
    {
        return json_encode($report);
    }
}