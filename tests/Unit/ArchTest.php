<?php

arch('enums')
    ->expect('KnotsPHP\FlushDNS\Enums')
    ->toBeEnums();

arch('traits')
    ->expect('KnotsPHP\FlushDNS\Traits')
    ->toBeTraits();

arch('contracts')
    ->expect('KnotsPHP\FlushDNS\Contracts')
    ->toBeInterfaces();

arch('exceptions')
    ->expect('KnotsPHP\FlushDNS\Exceptions')
    ->toExtend(\KnotsPHP\FlushDNS\Exceptions\Exception::class)
    ->ignoring(\KnotsPHP\FlushDNS\Exceptions\Exception::class);

arch('debug')->preset()->php();
