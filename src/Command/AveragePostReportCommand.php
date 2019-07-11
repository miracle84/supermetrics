<?php

namespace Command;

/**
 * Class AveragePostReportCommand
 * @package Command
 */
class AveragePostReportCommand extends BaseReportCommand
{
    public function config()
    {
        $this
            ->setName('average_post')
            ->setDescription('Average number of posts per user / month');
    }
}