<?php

namespace Entity;

/**
 * Class ReportData
 * @package Entity
 *
 * For
 */
class ReportData
{
    /** @var string[] */
    private $headerList;
    /** @var string[] */
    private $rowList;

    /**
     * Report constructor.
     * @param string[] $headerList
     * @param string[] $rowList
     *
     * USING simple array, not assoc
     */
    public function __construct(array $headerList, array $rowList)
    {
        $this->headerList = array_values($headerList);
        $this->rowList = array_values($rowList);
    }

    /**
     * @return string[]
     */
    public function getHeaderList(): array
    {
        return $this->headerList;
    }

    /**
     * @return string[]
     */
    public function getRowList(): array
    {
        return $this->rowList;
    }
}