<?php

namespace Nofutur3\Bootstrap;

class SymfonyPaths extends BasePath implements IPaths
{
    protected $options = [
        'temp' => '/var/temp',
        'log' => '/var/log',
        'config' => '/config',
        'app' => '/app',
        'public' => '/public',
    ];
}
