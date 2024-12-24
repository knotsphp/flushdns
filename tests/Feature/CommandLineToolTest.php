<?php

use KnotsPHP\FlushDNS\FlushDNS;

it('can execute', function () {
    exec('php cli/flushdns.php', $output, $result_code);
    $output = implode(PHP_EOL, $output);
    expect($result_code)->toBe(0)
        ->and($output)->toContain('> ');
})->skip(fn () => FlushDNS::needsElevation() ? 'This test is skipped because it requires elevation to run.' : false);
