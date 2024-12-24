<?php

it('can execute', function () {
    exec('php cli/flushdns.php', $output, $result_code);
    $output = implode(PHP_EOL, $output);
    expect($result_code)->toBe(0)
        ->and($output)->toContain('> ');
})->skip('This test is skipped because it requires elevation to run.');
