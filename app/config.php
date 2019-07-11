<?php

$serviceList = [];
// report commands
$serviceList['command.average_post'] = [
    'name' => 'Command\AveragePostReportCommand',
    'argument_list' => ['report_view.console_table', 'report_generator.average_post'],
    'tag' => 'command'
];
$serviceList['command.longest_post'] = [
    'name' => 'Command\LongestPostReportCommand',
    'argument_list' => ['report_view.console_table', 'report_generator.longest_post'],
    'tag' => 'command'
];
$serviceList['command.total_post'] = [
    'name' => 'Command\TotalPostReportCommand',
    'argument_list' => ['report_view.console_table', 'report_generator.total_post'],
    'tag' => 'command'
];
$serviceList['command.average_length_post'] = [
    'name' => 'Command\AverageLengthPostReportCommand',
    'argument_list' => ['report_view.console_table', 'report_generator.average_length_post'],
    'tag' => 'command'
];
// report generators
$serviceList['report_generator.average_post'] = [
    'name' => 'Service\ReportGenerator\BasePostReportGenerator',
    'argument_list' => ['report_logic.average_post', 'provider_facade.supermetrics_api']
];
$serviceList['report_generator.longest_post'] = [
    'name' => 'Service\ReportGenerator\BasePostReportGenerator',
    'argument_list' => ['report_logic.longest_post', 'provider_facade.supermetrics_api']
];
$serviceList['report_generator.total_post'] = [
    'name' => 'Service\ReportGenerator\BasePostReportGenerator',
    'argument_list' => ['report_logic.total_post', 'provider_facade.supermetrics_api']
];
$serviceList['report_generator.average_length_post'] = [
    'name' => 'Service\ReportGenerator\BasePostReportGenerator',
    'argument_list' => ['report_logic.average_length_post', 'provider_facade.supermetrics_api']
];
// API
$serviceList['data_provider.supermetrics_api'] = [
    'name' => 'Service\DataProvider\SupermetricsApi',
    'argument_list' => ['http_client', '%supermetrics.client_id%', '%supermetrics.email%', '%supermetrics.name%']
];
// Facade for API
$serviceList['provider_facade.supermetrics_api'] = [
    'name' => 'Service\DataProvider\Facade\SupermetricsApiFacade',
    'argument_list' => ['data_provider.supermetrics_api']
];
// reports logic
$serviceList['report_logic.average_post'] = ['name' => 'Service\ReportLogic\AveragePostLogic'];
$serviceList['report_logic.longest_post'] = ['name' => 'Service\ReportLogic\LongestPostLogic'];
$serviceList['report_logic.total_post'] = ['name' => 'Service\ReportLogic\TotalPostLogic'];
$serviceList['report_logic.average_length_post'] = ['name' => 'Service\ReportLogic\AverageLengthPostLogic'];
// views
$serviceList['report_view.console_table'] = ['name' => 'View\ReportConsoleTableView'];
// technical command
$serviceList['command.help'] = [
    'name' => 'My\Kernel\Command\HelpCommand',
    'tag' => 'command'
];
// technical
$serviceList['http_client'] = ['name' => 'My\HttpClient\HttpClient'];

