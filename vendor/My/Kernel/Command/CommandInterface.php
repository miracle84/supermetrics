<?php

namespace My\Kernel\Command;

/**
 * Interface CommandInterface
 * @package Kernel\Command
 */
interface CommandInterface
{
    public function config();
    public function execute();
}
