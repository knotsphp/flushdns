<?php

namespace KnotsPHP\FlushDNS;

use KnotsPHP\FlushDNS\Exceptions\OperatingSystemNotSupported;
use KnotsPHP\System\Contracts\OperatingSystem as OperatingSystemContract;
use KnotsPHP\System\Enums\OperatingSystem;
use KnotsPHP\System\System;

class FlushDNS
{
    /**
     * Get the command to flush the DNS.
     */
    public static function getCommand(): string
    {
        $os = OperatingSystem::current();
        $system = System::os();

        return match ($os) {
            OperatingSystem::Windows => 'ipconfig /flushdns',
            OperatingSystem::MacOS => self::getMacOSCommand($system),
            OperatingSystem::Linux => self::getLinuxCommand($system),
            default => throw new OperatingSystemNotSupported,
        };
    }

    /**
     * Get the cURL options to use.
     *
     * @return non-empty-array<int, mixed>
     */
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
        return match (OperatingSystem::current()) {
            OperatingSystem::Windows => false,
            OperatingSystem::MacOS => str_starts_with(self::getMacOSCommand(System::os()), 'sudo'),
            OperatingSystem::Linux => str_starts_with(self::getLinuxCommand(System::os()), 'sudo'),
            default => throw new OperatingSystemNotSupported,
        };
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

    /**
     * Get the command for macOS.
     */
    private static function getMacOSCommand(OperatingSystemContract $system): string
    {
        $version = array_map('intval', explode('.', $system->version()));
        $major = $version[0];
        $minor = $version[1];

        if ($major === 10) {
            if ($minor === 10) {
                // 10.10 Yosemite
                return 'sudo discoveryutil udnsflushcaches';
            } elseif ($minor >= 7 && $minor <= 14) {
                // From 10.7 Lion to 10.14 Mojave
                return 'sudo killall -HUP mDNSResponder';
            } elseif ($minor === 6) {
                // 10.6 Snow Leopard
                return 'sudo dscacheutil -flushcache';
            } elseif ($minor === 5) {
                // 10.5 Leopard
                return 'sudo lookupd -flushcache';
            } elseif ($minor === 4) {
                // 10.4 Tiger
                return 'lookupd -flushcache';
            } elseif ($minor >= 15) {
                // 10.15 Catalina and later
                return 'sudo dscacheutil -flushcache; sudo killall -HUP mDNSResponder';
            }
        }

        // Recent versions of macOS
        return 'sudo dscacheutil -flushcache; sudo killall -HUP mDNSResponder';
    }

    /**
     * Get the command for Linux.
     */
    private static function getLinuxCommand(OperatingSystemContract $system): string
    {
        // Contributions are welcome to add other distributions
        // Some examples of commands, we just need some way to check which service is running
        // Some other commands to implement:
        // sudo service dnsmasq restart
        // sudo service nscd restart

        // works on all modern and major distributions
        return 'sudo systemd-resolve --flush-caches';
    }
}
