<?php

use My\Kernel\ServiceContainer;

define('PROJECT_DIR', __DIR__ . '/..');

$serviceList = [];
$paramList = [];

require_once PROJECT_DIR . '/app/params.php';
require_once PROJECT_DIR . '/app/config.php';
require_once PROJECT_DIR . '/vendor/My/Kernel/Autoload.php';
require_once PROJECT_DIR . '/vendor/My/Kernel/ServiceContainer.php';

ServiceContainer::init($serviceList, $paramList);