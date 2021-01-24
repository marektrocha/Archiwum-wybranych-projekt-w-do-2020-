Convert RSS to CSV package
================

### Description

- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)
- [Credits](#credits)


Installation
------------

Add the convert-rss-to-csv package to your `composer.json` file.

``` json
{
    "require": {
        "trocha/convert-rss-to-csv": "1.0.0"
    }
}
```

Or via the command line in the root of your Laravel installation.

``` bash
$ composer require "trocha/convert-rss-to-csv:1.0.0"
```

Usage
-----

In CLI write:

``` bash
$ php src/console.php csv:simple URL PATH.csv
$ php src/console.php csv:extended URL PATH.csv

```


Testing
-------

``` bash
$ phpunit
```



Credits
-------

- [Marek Trocha](https://github.com/marektrocha)
