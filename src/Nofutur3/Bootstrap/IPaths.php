<?php

namespace Nofutur3\Bootstrap;


interface IPaths
{
    /** Returns the path to temp directory */
    public function getTempDir(): string;

    /** Returns path to log directory */
    public function getLogDir(): string ;

    /** Returns path to config directory */
    public function getConfigDir(): string;

    /** Returns path to app directory */
    public function getAppDir(): string;

    /** Returns path to public directory */
    public function getPublicDir(): string;

    /** Returns the path to the root of the project */
    public function getRootDir(): string;
}