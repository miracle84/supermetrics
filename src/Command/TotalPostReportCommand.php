<?php

namespace Command;

/**
 * Class TotalPostReportCommand
 * @package Command
 */
class TotalPostReportCommand extends BaseReportCommand
{
    public function config()
    {
        $this
            ->setName('total_post')
            ->setDescription('Total posts split by week');
    }
}