#!/usr/bin/env php
<?php

use KnotsPHP\FlushDNS\FlushDNS;

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

if (! class_exists('\Composer\InstalledVersions')) {
    require __DIR__.'/../vendor/autoload.php';
}

if (class_exists('\NunoMaduro\Collision\Provider')) {
    (new \NunoMaduro\Collision\Provider)->register();
}

$ipVersion = null;

// if --help or -h is passed, show help
if (in_array('--help', $argv) || in_array('-h', $argv)) {
    echo 'Usage: flushdns'.PHP_EOL;
    echo PHP_EOL;
    exit(0);
}

$command = FlushDNS::getCommand();

echo '> '.$command.PHP_EOL;

FlushDNS::run();
