# Bootstrap wrapper for [Nette](https://www.nette.org) framework
[![Build Status](https://travis-ci.org/nofutur3/nette-bootstrap.svg?branch=master)](https://travis-ci.org/nofutur3/nette-bootstrap)
[![Downloads this Month](https://img.shields.io/packagist/dm/nofutur3/nette-bootstrap.svg)](https://packagist.org/packages/nofutur3/nette-bootstrap)
[![Latest stable](https://img.shields.io/packagist/v/nofutur3/nette-bootstrap.svg)](https://packagist.org/packages/nofutur3/nette-bootstrap)


Bootstrap wrapper with dotenv support.

## Installation

The recommended installation is using [composer](https://getcomposer.org/). 


```
composer require nofutur3/nette-bootstrap
```

Alternative way - in case you are not able to use composer. Download the source code (ie clone git repo) into your project
and require it some way. For [nette framework](https://nette.org/en/) like this in your bootstrap file:
```
$configurator
    ->createRobotLoader()
    ->addDirectory(__DIR__ . 'path/to/library/');
```

## Usage