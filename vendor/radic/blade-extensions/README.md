![Laravel logo](http://laravel.com/assets/img/laravel-logo.png)  Laravel Blade Extensions
========================

[![Build Status](https://img.shields.io/travis/RobinRadic/blade-extensions.svg?branch=master&style=flat-square)](https://travis-ci.org/RobinRadic/blade-extensions)
[![GitHub Version](https://img.shields.io/github/tag/robinradic/blade-extensions.svg?style=flat-square&label=version)](http://badge.fury.io/gh/robinradic%2Fblade-extensions)
[![Total Downloads](https://img.shields.io/packagist/dt/radic/blade-extensions.svg?style=flat-square)](https://packagist.org/packages/radic/blade-extensions)
[![License](http://img.shields.io/badge/license-MIT-ff69b4.svg?style=flat-square)](http://radic.mit-license.org)

<!-- [![Code Coverage](https://img.shields.io/badge/coverage-100%-green.svg?style=flat-square)](http://robin.radic.nl/blade-extensions/coverage) -->
A _Laravel_ package providing additional Blade functionality. 

**Tested on all Laravel 5.x & 6.x versions.**

The package follows the FIG standards PSR-1, PSR-2, and PSR-4 to ensure a high level of interoperability between shared PHP code.

### Version 7.3
<!-- [**Documentation**](http://robin.radic.nl/blade-extensions) (or alternatively read it [**here**](docs/index.md) on github) -->
- [**Documentation**](docs/index.md)
- [**Changelog**](docs/prologue/changelog-upgrade-guide.md)
- [**Code of Conduct**](docs/CODE_OF_CONDUCT.md)  
- [**Contributing**](docs/CONTRIBUTING.md)  
- [**Pull Request Template**](docs/PULL_REQUEST_TEMPLATE.md)  
- [**Issue Template**](docs/ISSUE_TEMPLATE.md)

#### Features
- Compatible with [all Laravel 5 & 6 versions](https://travis-ci.org/RobinRadic/blade-extensions)
- **20+** Configurable, nameable, extendable, replaceable, testable directives.
- Compile Blade strings **with** variables `BladeExtensions::compileString($string, array $vars = [])`
- Progamatically push content to a stack inside blade view(s) `BladeExtensions::pushToStack($stack, $views, $content)`
- Even if you **don't use any of the directives**, Blade Extensions provides you with a great method to manage your directives.

#### Directives
All directives can be disabled, extended or replaced.
- [@set / @unset](docs/directives/set-unset.md) Setting and unsetting of values
- [@breakpoint / @dump](docs/directives/breakpoint-dump.md) Dump values to screen and set breakpoints in views
- [@foreach / @break / @continue](docs/directives/foreach-break-continue.md) Loop data and extras (similair to twig `$loop`)
- [@embed](docs/directives/embed.md) Think of embed as combining the behaviour of include and extends. (similair to twig `embed`)
- [@minify / @endminify](docs/directives/minify.md)  Minify inline code. Supports CSS, JS and HTML.
- [@macro / @endmacro/ @macrodef](docs/directives/macro.md) Defining and running macros
- [@markdown/ @endmarkdown](docs/directives/markdown.md)
- [@spaceless / @endspaceless](docs/directives/spaceless.md)
- and more...



### Installation

#### 1. Composer
```JSON
"radic/blade-extensions": "~7.1"
```

#### 2. Laravel
```php
Radic\BladeExtensions\BladeExtensionsServiceProvider::class
```

#### 3.Configuration

The first version of this package was created for Laravel 4.2. In the later releases Laravel introduced quite a few similar directives/functionality like the 
[foreach loop variable](https://laravel.com/docs/5.6/blade#the-loop-variable), [Components & Slots](https://laravel.com/docs/5.6/blade#components-and-slots), etc. 
This package automaticly disables some directives depending on your Laravel version. The configuration file allows you to fully configure this behaviour.
Make sure to check it out.

### Copyright/License
Copyright 2015 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](http://radic.mit-license.org) 
 
 
 
 
