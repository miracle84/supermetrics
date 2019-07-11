<?php

namespace Service\ReportGenerator;

use Entity\ReportData;
use Exception;
use Service\DataProvider\Facade\ApiFacadeInterface;
use Service\ReportLogic\BasePostReportLogic;

class BasePostReportGenerator implements ReportGeneratorInterface
{
    /** @var BasePostReportLogic  */
    private $logic;
    /** @var ApiFacadeInterface */
    private $apiFacade;

    const MAX_POST_PAGE = 10;

    /**
     * AveragePostReportGenerator constructor.
     * @param BasePostReportLogic $logic
     * @param ApiFacadeInterface $apiFacade
     */
    public function __construct(BasePostReportLogic $logic, ApiFacadeInterface $apiFacade)
    {
        $this->logic = $logic;
        $this->apiFacade = $apiFacade;
    }

    /**
     * @return ReportData
     *
     * @throws Exception
     */
    public function generate(): ReportData
    {
        $postList = $this->apiFacade->getPostList(self::MAX_POST_PAGE);
        $this->logic->setPostList($postList);

        return $this->logic->getReportData();
    }
}