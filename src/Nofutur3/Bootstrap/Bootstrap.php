<?php

namespace Nofutur3\Bootstrap;

use Nette\Configurator;
use Nette\DI\Container;

class Bootstrap
{
    /** @var IPaths */
    private $paths;

    /** @var Configurator */
    private $configurator;

    /** @var array */
    private $dirsForLoader;

    /** @var array */
    private $configFiles;

    /**
     * Bootstrap constructor.
     */
    public function __construct(IPaths $paths = null)
    {
        $this->configurator = new Configurator();
        $this->paths = $paths;
        // todo: debug mode from config file
    }

    /**
     * @param IPaths $paths
     *
     * @return Bootstrap
     */
    public function setPaths(IPaths $paths): self
    {
        $this->paths = $paths;

        return $this;
    }

    public function build(): Container
    {
        if (!$this->paths) {
            $this->paths = $this->createDefaultPaths();
        }

        // debugger & env
        $this->setFrameworkPaths();

        // robot loader
        if ($this->dirsForLoader) {
            $robotLoader = $this->configurator->createRobotLoader();

            foreach ($this->dirsForLoader as $dir) {
                $robotLoader->addDirectory($dir);
            }

            $robotLoader->register();
        }

        // load config files
        $this->loadConfigFiles();

        // load params (paths)

        return $this
            ->configurator
            ->createContainer();
    }

    public function addDirectoryForLoader(string $directory): self
    {
        $this->dirsForLoader[] = $directory;

        return $this;
    }

    public function addDirectoriesForLoader(array $dirs): self
    {
        foreach ($dirs as $key => $dir) {
            $this->addDirectoryForLoader($dir);
        }

        return $this;
    }

    public function addConfigFiles(array $fileNames): self
    {
        foreach ($fileNames as $key => $file) {
            $this->addConfigFile($file);
        }

        return $this;
    }

    public function addConfigFile(string $fileName): self
    {
        $this->configFiles[] = $fileName;

        return $this;
    }

    private function setFrameworkPaths(): void
    {
        $this->configurator
            ->setTempDirectory($this->paths->getTempDir())
            ->enableDebugger($this->paths->getLogDir()) // todo: email
            ;

        $this->configurator->addParameters([
            'appDir' => $this->paths->getAppDir(),
            'wwwDir' => $this->paths->getPublicDir(),
        ]);
    }

    private function createDefaultPaths()
    {
        $this->paths = new NettePaths(__DIR__.'/../');
    }

    private function loadConfigFiles()
    {
        // todo: load by environment? how? and how to handle environment?
        if (!$this->configFiles) {
            $this->configFiles[] = 'config.neon';
        }

        foreach ($this->configFiles as $file) {
            $this->configurator->addConfig($this->paths->getConfigDir().'/'.$file);
        }
    }
}
