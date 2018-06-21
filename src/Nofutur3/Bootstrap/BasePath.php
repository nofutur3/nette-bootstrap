<?php

namespace Nofutur3\Bootstrap;

abstract class BasePath
{
    protected $rootDir;

    /** @var array */
    protected $options;

    /**
     * BasePath constructor.
     *
     * @param string $rootDir path to the root of the project
     */
    public function __construct(string $rootDir)
    {
        $this->options['root'] = $this->rootDir = $rootDir;
    }

    /**
     * @return string
     */
    public function getRootDir(): string
    {
        return $this->rootDir;
    }

    /** Returns the path to temp directory */
    public function getTempDir(): string
    {
        return $this->rootDir.'/'.$this->options['temp'];
    }

    /** Returns path to log directory */
    public function getLogDir(): string
    {
        return $this->rootDir.'/'.$this->options['log'];
    }

    /** Returns path to config directory */
    public function getConfigDir(): string
    {
        return $this->rootDir.'/'.$this->options['config'];
    }

    /** Returns path to app directory */
    public function getAppDir(): string
    {
        return $this->rootDir.'/'.$this->options['app'];
    }

    /** Returns path to public directory */
    public function getPublicDir(): string
    {
        return $this->rootDir.'/'.$this->options['public'];
    }
}
