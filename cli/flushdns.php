#!/usr/bin/env php
<?php

use Composer\InstalledVersions;
use KnotsPHP\FlushDNS\FlushDNS;
use NunoMaduro\Collision\Provider;

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

if (! class_exists(InstalledVersions::class)) {
    require __DIR__.'/../vendor/autoload.php';
}

if (class_exists(Provider::class)) {
    (new Provider)->register();
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
