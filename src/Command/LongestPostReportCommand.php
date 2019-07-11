<?php

namespace Command;

/**
 * Class LongestPostReportCommand
 * @package Command
 */
class LongestPostReportCommand extends BaseReportCommand
{
    public function config()
    {
        $this
            ->setName('longest_post')
            ->setDescription('Longest post by character length / month');
    }
}