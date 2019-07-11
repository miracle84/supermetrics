<?php

namespace View;

use Entity\ReportData;

class ReportConsoleTableView implements ReportViewInterface
{
    const MAX_COLUMN_DATA_SIZE = 30;
    const LEFT_SPACE = 1;
    const RIGHT_SPACE = 1;

    /**
     * @param ReportData $report
     *
     * @return string
     */
    public function render(ReportData $report): string
    {
        // max size columns or MAX_COLUMN_SIZE - need for formatting
        $columnSizeList = array_map(function ($column) {
            return min(mb_strlen($column), self::MAX_COLUMN_DATA_SIZE);
        }, $report->getHeaderList());

        foreach ($report->getRowList() as $row) {

            foreach ($row as $i => $data) {
                $columnSizeList[$i] = min(max($columnSizeList[$i], mb_strlen($data)), self::MAX_COLUMN_DATA_SIZE);
            }
        }

        $result = $this->createTableRow($report->getHeaderList(), $columnSizeList);
        $maxIndex = count($report->getRowList()) -1;

        foreach ($report->getRowList() as $i => $row) {
            $result .= $this->createTableRow($row, $columnSizeList, false, $maxIndex == $i);
        }

        return $result;
    }

    /**
     * @param array $row
     * @param array $columnSizeList
     * @param bool $needTopLine
     * @param bool $needBottomLine
     *
     * @return string
     *
     * text align left, it is not configurable for now
     */
    private function createTableRow(array $row, array $columnSizeList, $needTopLine = true, $needBottomLine = true): string
    {
        if (!$row) return '';

        $result = '';
        $fullLength = array_sum($columnSizeList) + (self::LEFT_SPACE + self::RIGHT_SPACE + 1) * count($columnSizeList) + 1;

        if ($needTopLine) {
            $result = str_repeat('-', $fullLength) . PHP_EOL;
        }

        foreach ($row as $i => $column) {
            $result .= '|'
            . str_repeat(' ', self::LEFT_SPACE)
            . ((mb_strlen($column) > self::MAX_COLUMN_DATA_SIZE)
                ? substr($column, 0,self::MAX_COLUMN_DATA_SIZE - 3) . '...'
                : str_pad($column, $columnSizeList[$i])
                )
            . str_repeat(' ', self::RIGHT_SPACE)
            ;
        }

        $result .= '|' . PHP_EOL;

        if ($needBottomLine) {
            $result .= str_repeat('-', $fullLength) . PHP_EOL;
        }

        return $result;
    }
}