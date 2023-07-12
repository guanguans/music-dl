# music-dl

<p align="center"><img src="resources/usage.gif" alt="usage" title="usage"></p>

[简体中文](README-zh_CN.md) | [ENGLISH](README.md)

> Music Searcher and Downloader. - 音乐搜索下载器。

> :warning: This tool is only used for learning and communication. It is forbidden to use this tool for commercial purposes. If a legal dispute arises, it has nothing to do with me.

[![tests](https://github.com/guanguans/music-dl/workflows/tests/badge.svg)](https://github.com/guanguans/music-dl/actions)
[![codecov](https://codecov.io/gh/guanguans/music-dl/branch/master/graph/badge.svg?token=Ja51ScYtHN)](https://codecov.io/gh/guanguans/music-dl)
[![check & fix styling](https://github.com/guanguans/music-dl/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/guanguans/music-dl/actions)
[![Latest Stable Version](https://poser.pugx.org/guanguans/music-dl/v)](//packagist.org/packages/guanguans/music-dl)
![GitHub release (latest by date)](https://img.shields.io/github/v/release/guanguans/music-dl)
[![Total Downloads](https://poser.pugx.org/guanguans/music-dl/downloads)](//packagist.org/packages/guanguans/music-dl)
[![License](https://poser.pugx.org/guanguans/music-dl/license)](//packagist.org/packages/guanguans/music-dl)

## Requirement

* PHP >= 8.0

## Installation

### Download the [music-dl](./builds/music-dl) file

```shell
curl 'https://raw.githubusercontent.com/guanguans/music-dl/master/builds/music-dl' -o music-dl --progress
chmod +x music-dl
```

### Install via Composer

```shell
composer global require guanguans/music-dl --dev -v # global
composer require guanguans/music-dl --dev -v # local
```

## Usage

```shell
╰─ ./music-dl                                                                         ─╯

     __  __           _        _____  _
    |  \/  |         (_)      |  __ \| |
    | \  / |_   _ ___ _  ___  | |  | | |
    | |\/| | | | / __| |/ __| | |  | | |
    | |  | | |_| \__ \ | (__  | |__| | |____
    |_|  |_|\__,_|___/_|\___| |_____/|______| 3.5.2

 请输入关键字如：一个短篇  腰乐队  Yesterday once more，或按 Ctrl+C 退出程序 [腰乐队]:
 > 
```

```shell
╰─ ./music-dl --help                                                                                                       ─╯
Description:
  Search and download music

Usage:
  music [options] [--] [<keyword>]

Arguments:
  keyword                  Search keyword for music

Options:
      --driver[=DRIVER]    Specify the search driver(async、fork、sequence) [default: "sequence"]
  -d, --dir[=DIR]          Specify the download directory
      --sources[=SOURCES]  Specify the music sources(tencent、netease、kugou) (multiple values allowed)
  -h, --help               Display help for the given command. When no command is given display help for the music command
  -q, --quiet              Do not output any message
  -V, --version            Display this application version
      --ansi|--no-ansi     Force (or disable --no-ansi) ANSI output
  -n, --no-interaction     Do not ask any interactive question
      --env[=ENV]          The environment the command should run under
  -v|vv|vvv, --verbose     Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

```shell
╰─ ./music-dl list                                           ─╯

  Music DL  3.5.2

  USAGE: music-dl <command> [options] [arguments]

  completion     Dump the shell completion script
  inspire        Display an inspiring quote
  music          Search and download music
  self-update    Allows to self-update a build application
  thanks         Thanks for using this tool.
```

![vhs](resources/music-dl.gif)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

* [guanguans](https://github.com/guanguans)
* [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
