<?php

namespace Nofutur3\Bootstrap;


class NettePaths extends BasePath implements IPaths
{
    protected $options = [
        'temp' => '/temp',
        'log' => '/log',
        'config' => '/app/config',
        'app' => '/app',
        'public' => '/public',
    ];
}