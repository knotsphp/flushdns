<?php

use KnotsPHP\FlushDNS\FlushDNS;

it('returns a command', function () {
    $command = FlushDNS::getCommand();

    expect($command)
        ->not->toBeEmpty();
});

it('can run the command', function () {
    $result = FlushDNS::run();
    expect($result)
        ->toBeTrue();
})->skip('This test is skipped because it requires elevation to run.');
