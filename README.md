# php-chardet [![Build Status](https://travis-ci.org/yupmin/php-chardet.svg?branch=master)](https://travis-ci.org/yupmin/php-chardet) [![Coverage Status](https://coveralls.io/repos/yupmin/php-chardet/badge.svg?branch=master&service=github)](https://coveralls.io/github/yupmin/php-chardet?branch=master)

## Introduction

PHP wrapper around the `chardet` command

## Table of contents:
- [Installation](#installation)
- [How to use](#how-to-use)
- [License](#license)
- [Reference](#reference)

## Installation

### 1 - Install chardet

You should install [chardet](https://pypi.python.org/pypi/chardet):

#### Using pip:

```bash
sudo pip install chardet
sudo ln -s /usr/local/bin/chardetect /usr/local/bin/chardet
```

#### On ubuntu linux:

```bash
sudo apt-get install python-chardet
```

### 2 - Integration in your php project

To use this library install it through [Composer](https://getcomposer.org/), run

```bash
composer require yupmin/php-chardet
```

## How to use

### Retrieve chardet container

```php
<?php
//...
use Yupmin\PHPChardet\Chardet;
//...
$chardet = new Chardet();
$chardetContainer = $chardet->analyze('test.txt');

$filePath = $chardetContainer->getFilePath();
$charset = $chardetContainer->getCharset();
$confidence = $chardetContainer->getConfidence();
//...
```

## License
See `LICENSE` for more information

## Reference
- [php-mediainfo](https://github.com/mhor/php-mediainfo)
