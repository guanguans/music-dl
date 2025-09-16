# music-dl

<p align="center"><img src="resources/images/music-dl.gif" alt="usage" title="usage"></p>

[简体中文](README-zh_CN.md) | [ENGLISH](README.md)

> Music Searcher and Downloader. - 音乐搜索下载器。

> :warning: 本工具仅用于学习交流，禁止将本工具用于商业用途，如产生法律纠纷与本人无关。

[![tests](https://github.com/guanguans/music-dl/workflows/tests/badge.svg)](https://github.com/guanguans/music-dl/actions)
[![codecov](https://codecov.io/gh/guanguans/music-dl/branch/master/graph/badge.svg?token=Ja51ScYtHN)](https://codecov.io/gh/guanguans/music-dl)
[![check & fix styling](https://github.com/guanguans/music-dl/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/guanguans/music-dl/actions)
[![Latest Stable Version](https://poser.pugx.org/guanguans/music-dl/v)](//packagist.org/packages/guanguans/music-dl)
![GitHub release (latest by date)](https://img.shields.io/github/v/release/guanguans/music-dl)
[![Total Downloads](https://poser.pugx.org/guanguans/music-dl/downloads)](//packagist.org/packages/guanguans/music-dl)
[![License](https://poser.pugx.org/guanguans/music-dl/license)](//packagist.org/packages/guanguans/music-dl)

## 环境要求

* PHP >= 8.3

## 安装

### 直接下载 [music-dl](./builds/music-dl) 文件

```shell
curl 'https://raw.githubusercontent.com/guanguans/music-dl/master/builds/music-dl' -o music-dl --progress-bar
chmod +x music-dl
```

### 通过 Composer 安装

```shell
composer global require guanguans/music-dl:dev-master --dev -v --ignore-platform-req=ext-pcntl # 全局
composer require guanguans/music-dl:dev-master --dev -v --ignore-platform-req=ext-pcntl # 本地
```

## 使用

```shell
╰─ ./music-dl list                                                                                                        ─╯

  Music DL  refs/tags/4.1.6

  USAGE:  <command> [options] [arguments]

  completion  Dump the shell completion script
  inspire     Display an inspiring quote
  music       Search and download music
  self-update Allows to self-update a build application
  thanks      Thanks for using this tool.
```

```shell
╰─ ./music-dl music --help                                                                                                      ─╯
Description:
  Search and download music

Usage:
  music [options] [--] [<keyword>]

Arguments:
  keyword                  Search keyword for music

Options:
      --driver[=DRIVER]    Specify the search driver(sync、fork、process) [default: "sync"]
  -d, --dir[=DIR]          Specify the download directory
      --break              Specify whether to break after download
      --sources[=SOURCES]  Specify the music sources(tencent、netease、kugou) (multiple values allowed)
  -h, --help               Display help for the given command. When no command is given display help for the music command
  -q, --quiet              Do not output any message
  -V, --version            Display this application version
      --ansi|--no-ansi     Force (or disable --no-ansi) ANSI output
  -n, --no-interaction     Do not ask any interactive question
      --env[=ENV]          The environment the command should run under
  -v|vv|vvv, --verbose     Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

![usage](resources/images/music-dl.gif)

## 测试

```bash
composer test
```

## 变更日志

请参阅 [CHANGELOG](CHANGELOG.md) 获取最近有关更改的更多信息。

## 贡献指南

请参阅 [CONTRIBUTING](.github/CONTRIBUTING.md) 有关详细信息。

## 安全漏洞

请查看[我们的安全政策](../../security/policy)了解如何报告安全漏洞。

## 贡献者

* [guanguans](https://github.com/guanguans)
* [所有贡献者](../../contributors)

## 协议

MIT 许可证（MIT）。有关更多信息，请参见[协议文件](LICENSE)。
