# music-dl

<p align="center"><img src="resources/images/music-dl.gif" alt="usage" title="usage"></p>

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

* PHP >= 8.4

## Installation

### Download the [music-dl](./builds/music-dl) file

```shell
curl 'https://raw.githubusercontent.com/guanguans/music-dl/master/builds/music-dl' -o music-dl --progress-bar
chmod +x music-dl
```

### Install via Composer

```shell
composer global require guanguans/music-dl:dev-master --dev -v --ignore-platform-req=ext-pcntl # global
composer require guanguans/music-dl:dev-master --dev -v --ignore-platform-req=ext-pcntl # local
```

## Usage

```shell
╰─ ./music-dl list                                                                                                        ─╯

  Music DL  refs/tags/6.2.5

  USAGE:  <command> [options] [arguments]

  completion  Dump the shell completion script
  inspire     Display an inspiring quote
  music       Search and download music
  self-update Self-update the installed application
  thanks      Thanks for using this tool.
```

```shell
Description:
  Search and download music

Usage:
  music [options] [--] [<keyword>]

Arguments:
  keyword                              Search keyword for music

Options:
  -b, --break                          Specify whether to break after download
  -d, --directory[=DIRECTORY]          Specify the download directory
  -D, --driver[=DRIVER]                Specify the search driver(sync、fork、process) [default: "sync"]
  -l, --locale[=LOCALE]                Specify the locale language [default: "zh_CN"]
  -p, --page[=PAGE]                    Specify the page number [default: "1"]
  -P, --per-page[=PER-PAGE]            Specify the per page number [default: "30"]
  -s, --sources[=SOURCES]              Specify the music sources(tencent、netease、kugou) (multiple values allowed)
      --isolated[=ISOLATED]            Do not run the command if another instance of the command is already running [default: false]
      --xdebug                         Display xdebug output
      --configuration[=CONFIGURATION]  Used to dynamically pass one or more configuration key-value pairs(e.g. `--configuration=app.name=guanguans` or `--configuration app.name=guanguans`). (multiple values allowed)
  -h, --help                           Display help for the given command. When no command is given display help for the music command
      --silent                         Do not output any message
  -q, --quiet                          Only errors are displayed. All other output is suppressed
  -V, --version                        Display this application version
      --ansi|--no-ansi                 Force (or disable --no-ansi) ANSI output
  -n, --no-interaction                 Do not ask any interactive question
      --env[=ENV]                      The environment the command should run under
  -v|vv|vvv, --verbose                 Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

![usage](resources/images/music-dl.gif)

## Testing

```bash
composer test
```

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
