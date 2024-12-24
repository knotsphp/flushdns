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

// arch('exceptions')
//     ->expect('KnotsPHP\FlushDNS\Exceptions')
//     ->toExtend(Exception::class)
//     ->ignoring(Exception::class);

arch('debug')->preset()->php();
