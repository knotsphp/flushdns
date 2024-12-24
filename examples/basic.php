<?php

use KnotsPHP\FlushDNS\FlushDNS;

require_once __DIR__.'/../vendor/autoload.php';

// Get the command
$command = FlushDNS::getCommand();

echo $command.PHP_EOL;

echo PHP_EOL;
