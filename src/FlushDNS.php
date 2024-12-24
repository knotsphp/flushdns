<?php

namespace KnotsPHP\FlushDNS;

class FlushDNS
{
    /**
     * Get the command to flush the DNS.
     */
    public static function getCommand(): string
    {
        $os = PHP_OS_FAMILY;

        if ($os === 'Windows') {
            return 'ipconfig /flushdns';
        }

        if ($os === 'Darwin') {
            return 'sudo killall -HUP mDNSResponder';
        }

        return 'sudo systemd-resolve --flush-caches';
    }

    public static function getCurlOpts(): array
    {
        return [
            CURLOPT_DNS_CACHE_TIMEOUT => 0,
        ];
    }

    /**
     * Check if the command needs elevation.
     */
    public static function needsElevation(): bool
    {
        $os = PHP_OS_FAMILY;

        return $os !== 'Windows';
    }

    /**
     * Run the command to flush the DNS.
     */
    public static function run(): bool
    {
        $command = self::getCommand();

        exec($command, $output, $result_code);

        return $result_code === 0;
    }
}
