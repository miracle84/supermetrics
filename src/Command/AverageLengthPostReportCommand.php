<?php

namespace Command;

/**
 * Class AverageLengthPostReportCommand
 * @package Command
 */
class AverageLengthPostReportCommand extends BaseReportCommand
{
    public function config()
    {
        $this
            ->setName('average_length_post')
            ->setDescription('Average character length / post / month');
    }
}