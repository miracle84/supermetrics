<?php

namespace Command;

use Exception;
use My\Kernel\Command\AbstractCommand;
use Service\ReportGenerator\ReportGeneratorInterface;
use View\ReportViewInterface;

/**
 * Class BaseReportCommand
 * @package Command
 *
 * Class with common structure for reports
 */
abstract class BaseReportCommand extends AbstractCommand
{
    /** @var ReportGeneratorInterface */
    private $postReportGenerator;

    /** @var ReportViewInterface */
    private $viewService;

    /**
     * BaseReportCommand constructor.
     * @param ReportViewInterface $viewService
     * @param ReportGeneratorInterface $postReportGenerator
     */
    public function __construct(ReportViewInterface $viewService, ReportGeneratorInterface $postReportGenerator)
    {
        $this->viewService = $viewService;
        $this->postReportGenerator = $postReportGenerator;

        parent::__construct();
    }

    /**
     * @return ReportGeneratorInterface
     */
    public function getPostReportGenerator(): ReportGeneratorInterface
    {
        return $this->postReportGenerator;
    }

    /**
     * @return ReportViewInterface
     */
    public function getViewService(): ReportViewInterface
    {
        return $this->viewService;
    }

    public function execute()
    {
        try {
            $reportData = $this->postReportGenerator->generate();

            echo $this->viewService->render($reportData);

        } catch (Exception $exception) {
            echo 'Error with creating report : ' . $exception->getMessage();
        }
    }
}