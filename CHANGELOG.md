<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

<a name="unreleased"></a>
## [Unreleased]


<a name="5.3.1"></a>
## [5.3.1] - 2024-10-17
### Bug Fixes
- **bootstrap:** update logger extension reference

### Performance Improvements
- **app:** optimize download performance

### Pull Requests
- Merge pull request [#815](https://github.com/guanguans/music-dl/issues/815) from guanguans/dependabot/composer/larastan/larastan-2.9.9


<a name="5.3.0"></a>
## [5.3.0] - 2024-10-14
### Bug Fixes
- **Music:** correct progress display on completion
- **MusicCommand:** trim stdin input to remove trailing spaces

### Code Refactoring
- **app:** improve logger extension and exception handling

### Features
- **localization:** Improve searching hint with dynamic keyword
- **music:** read keyword from stdin for pipeline usage

### Performance Improvements
- **Music:** optimize progress update handling


<a name="5.2.9"></a>
## [5.2.9] - 2024-10-10
### Code Refactoring
- **commands:** add Rescuer trait to MusicCommand


<a name="5.2.8"></a>
## [5.2.8] - 2024-10-10
### Bug Fixes
- **Utils:** improve song name formatting and handle multi-artist scenarios

### Code Refactoring
- **Sanitizer:** improve artist names display
- **utils:** extract artist limit to constant

### Performance Improvements
- **Utils:** Simplify filename sanitization logic


<a name="5.2.7"></a>
## [5.2.7] - 2024-10-10
### Bug Fixes
- **Utils:** update directory separator handling


<a name="5.2.6"></a>
## [5.2.6] - 2024-10-10
### Bug Fixes
- 文件名不能包含下列任何字符 \ / : * ? " < > |
- **utils:** Improve song name formatting

### Code Refactoring
- **music-command:** Replace exception handler method

### Pull Requests
- Merge pull request [#812](https://github.com/guanguans/music-dl/issues/812) from midfar/master
- Merge pull request [#809](https://github.com/guanguans/music-dl/issues/809) from guanguans/dependabot/composer/laravel-zero/framework-11.0.2
- Merge pull request [#806](https://github.com/guanguans/music-dl/issues/806) from guanguans/dependabot/composer/rector/swiss-knife-1.0.0
- Merge pull request [#807](https://github.com/guanguans/music-dl/issues/807) from guanguans/dependabot/composer/rector/rector-1.2.6
- Merge pull request [#805](https://github.com/guanguans/music-dl/issues/805) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.44.0


<a name="5.2.5"></a>
## [5.2.5] - 2024-09-30
### Code Refactoring
- **HttpClientFactory:** change setHttpClient to instance method

### Features
- 更新了league/flysystem、league/flysystem-local和nikic/php-parser依赖版本

### Test
- **Music:** Mock HTTP client for music downloads


<a name="5.2.4"></a>
## [5.2.4] - 2024-09-29
### Docs
- **music:** add setMinCallMicroseconds method to facade

### Features
- **HttpClientFactory:** add setHttpClient method
- **music:** refactor Music class and remove InvalidArgumentException

### Performance Improvements
- **Music:** Refactor constructor for improved initialization

### Test
- **commands:** update assertion methods to assertOk
- **tests:** rename ArchTest and update Pest usage paths

### Pull Requests
- Merge pull request [#804](https://github.com/guanguans/music-dl/issues/804) from guanguans/dependabot/composer/ergebnis/license-2.5.0
- Merge pull request [#803](https://github.com/guanguans/music-dl/issues/803) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.37.0


<a name="5.2.3"></a>
## [5.2.3] - 2024-09-27
### Code Refactoring
- **music:** make minimum call time configurable

### Features
- 修改MusicCommand.php以支持动态关键词默认值
- **Music.php:** 移除了Music类中的meting格式化方法


<a name="5.2.2"></a>
## [5.2.2] - 2024-09-27
### Code Refactoring
- **commands:** remove unnecessary docblocks
- **music:** improve dependency injection and initialization
- **music:** Implement Isolatable interface and improve visibility

### Features
- **music:** add timebox functionality to search method

### Test
- **music:** ensure fork concurrency is set by default


<a name="5.2.1"></a>
## [5.2.1] - 2024-09-23
### Bug Fixes
- **app:** remove unused MusicManager references

### Docs
- **readme:** update search driver options in documentation

### Test
- **music:** add setDriver method and update tests


<a name="5.2.0"></a>
## [5.2.0] - 2024-09-23
### Bug Fixes
- **command:** update music command driver option

### Code Refactoring
- **music:** replace MusicManager with MusicContract

### Features
- **concurrency:** add concurrency service provider and config
- **music:** Refactor music command and rename SequenceMusic
- **music:** Refactor MusicCommand to use SequenceMusic with Concurrency

### Test
- **tests:** Improve pest configuration and debugging checks

### Pull Requests
- Merge pull request [#802](https://github.com/guanguans/music-dl/issues/802) from guanguans/dependabot/composer/rector/swiss-knife-0.2.35
- Merge pull request [#801](https://github.com/guanguans/music-dl/issues/801) from guanguans/dependabot/composer/driftingly/rector-laravel-1.2.4
- Merge pull request [#800](https://github.com/guanguans/music-dl/issues/800) from guanguans/dependabot/composer/driftingly/rector-laravel-1.2.3
- Merge pull request [#799](https://github.com/guanguans/music-dl/issues/799) from guanguans/dependabot/composer/rector/rector-1.2.5
- Merge pull request [#798](https://github.com/guanguans/music-dl/issues/798) from guanguans/dependabot/composer/rector/swiss-knife-0.2.33
- Merge pull request [#797](https://github.com/guanguans/music-dl/issues/797) from guanguans/dependabot/composer/symfony/polyfill-php83-1.31.0
- Merge pull request [#796](https://github.com/guanguans/music-dl/issues/796) from guanguans/dependabot/composer/vimeo/psalm-5.26.1
- Merge pull request [#795](https://github.com/guanguans/music-dl/issues/795) from guanguans/dependabot/composer/rector/swiss-knife-0.2.30
- Merge pull request [#794](https://github.com/guanguans/music-dl/issues/794) from guanguans/dependabot/composer/phpstan/extension-installer-1.4.3
- Merge pull request [#793](https://github.com/guanguans/music-dl/issues/793) from guanguans/dependabot/composer/driftingly/rector-laravel-1.2.2
- Merge pull request [#792](https://github.com/guanguans/music-dl/issues/792) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.36.0
- Merge pull request [#791](https://github.com/guanguans/music-dl/issues/791) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.8.6
- Merge pull request [#789](https://github.com/guanguans/music-dl/issues/789) from guanguans/dependabot/composer/phpstan/extension-installer-1.4.2
- Merge pull request [#788](https://github.com/guanguans/music-dl/issues/788) from guanguans/dependabot/composer/rector/rector-1.2.4
- Merge pull request [#787](https://github.com/guanguans/music-dl/issues/787) from guanguans/dependabot/composer/pestphp/pest-2.35.1
- Merge pull request [#786](https://github.com/guanguans/music-dl/issues/786) from guanguans/dependabot/composer/laravel/prompts-0.1.25
- Merge pull request [#785](https://github.com/guanguans/music-dl/issues/785) from guanguans/dependabot/composer/rector/swiss-knife-0.2.18
- Merge pull request [#783](https://github.com/guanguans/music-dl/issues/783) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.4.3


<a name="5.1.4"></a>
## [5.1.4] - 2024-08-16
### Features
- **exceptions:** remove Handler.php file

### Pull Requests
- Merge pull request [#782](https://github.com/guanguans/music-dl/issues/782) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.35.0
- Merge pull request [#781](https://github.com/guanguans/music-dl/issues/781) from guanguans/dependabot/composer/rector/rector-1.2.3
- Merge pull request [#780](https://github.com/guanguans/music-dl/issues/780) from guanguans/dependabot/composer/pestphp/pest-2.35.0
- Merge pull request [#779](https://github.com/guanguans/music-dl/issues/779) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.8.5
- Merge pull request [#778](https://github.com/guanguans/music-dl/issues/778) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.34.0
- Merge pull request [#777](https://github.com/guanguans/music-dl/issues/777) from guanguans/dependabot/composer/driftingly/rector-laravel-1.2.1
- Merge pull request [#776](https://github.com/guanguans/music-dl/issues/776) from guanguans/dependabot/composer/rector/rector-1.2.2
- Merge pull request [#775](https://github.com/guanguans/music-dl/issues/775) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.33.0
- Merge pull request [#774](https://github.com/guanguans/music-dl/issues/774) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.9.2
- Merge pull request [#773](https://github.com/guanguans/music-dl/issues/773) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.9.1
- Merge pull request [#772](https://github.com/guanguans/music-dl/issues/772) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.9.0
- Merge pull request [#771](https://github.com/guanguans/music-dl/issues/771) from guanguans/dependabot/composer/rector/rector-1.2.1
- Merge pull request [#770](https://github.com/guanguans/music-dl/issues/770) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.32.0


<a name="5.1.3"></a>
## [5.1.3] - 2024-07-12
### Code Refactoring
- **utils:** Change method names for default save directory and saved path

### Features
- **SequenceMusic:** Add sorting by multiple fields
- **composer:** add rector/swiss-knife to composer.json

### Test
- **test:** Update pest command to include colors


<a name="5.1.2"></a>
## [5.1.2] - 2024-07-12
### Code Refactoring
- **Sanitizer:** update file size formatting


<a name="5.1.1"></a>
## [5.1.1] - 2024-07-12
### Bug Fixes
- **app.php:** Improve registration of TinkerZeroServiceProvider


<a name="5.1.0"></a>
## [5.1.0] - 2024-07-12
### Features
- **bootstrap:** Register TinkerZeroServiceProvider in production
- **deps:** add tinker-zero dependency

### Pull Requests
- Merge pull request [#769](https://github.com/guanguans/music-dl/issues/769) from guanguans/dependabot/composer/pestphp/pest-2.34.9


<a name="5.0.2"></a>
## [5.0.2] - 2024-07-08
### Bug Fixes
- **MusicCommand:** Fix return type in when closure

### CI
- **automation:** Update method signature in Music.php facade

### Pull Requests
- Merge pull request [#768](https://github.com/guanguans/music-dl/issues/768) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-2.2.0
- Merge pull request [#767](https://github.com/guanguans/music-dl/issues/767) from guanguans/dependabot/composer/rector/rector-1.2.0
- Merge pull request [#766](https://github.com/guanguans/music-dl/issues/766) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.8.4
- Merge pull request [#765](https://github.com/guanguans/music-dl/issues/765) from guanguans/dependabot/composer/rector/rector-1.1.1
- Merge pull request [#764](https://github.com/guanguans/music-dl/issues/764) from guanguans/dependabot/composer/symfony/polyfill-php83-1.30.0
- Merge pull request [#763](https://github.com/guanguans/music-dl/issues/763) from guanguans/dependabot/composer/vimeo/psalm-5.25.0
- Merge pull request [#762](https://github.com/guanguans/music-dl/issues/762) from guanguans/dependabot/composer/laravel/prompts-0.1.24
- Merge pull request [#761](https://github.com/guanguans/music-dl/issues/761) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.43.0
- Merge pull request [#760](https://github.com/guanguans/music-dl/issues/760) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.31.0
- Merge pull request [#759](https://github.com/guanguans/music-dl/issues/759) from guanguans/dependabot/composer/pestphp/pest-2.34.8
- Merge pull request [#758](https://github.com/guanguans/music-dl/issues/758) from guanguans/dependabot/composer/laravel-lang/common-6.3.0
- Merge pull request [#757](https://github.com/guanguans/music-dl/issues/757) from guanguans/dependabot/composer/phpstan/extension-installer-1.4.1
- Merge pull request [#756](https://github.com/guanguans/music-dl/issues/756) from guanguans/dependabot/composer/phpstan/extension-installer-1.4.0
- Merge pull request [#755](https://github.com/guanguans/music-dl/issues/755) from guanguans/dependabot/composer/laravel-lang/common-6.2.1
- Merge pull request [#754](https://github.com/guanguans/music-dl/issues/754) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.8.3
- Merge pull request [#753](https://github.com/guanguans/music-dl/issues/753) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.30.1
- Merge pull request [#752](https://github.com/guanguans/music-dl/issues/752) from guanguans/dependabot/composer/larastan/larastan-2.9.7
- Merge pull request [#751](https://github.com/guanguans/music-dl/issues/751) from guanguans/dependabot/composer/laravel/prompts-0.1.23


<a name="5.0.1"></a>
## [5.0.1] - 2024-05-24
### Code Refactoring
- **app:** Update MusicManager singleton registration
- **app:** update service provider configuration
- **handler:** remove unnecessary code in Handler.php

### Features
- **bootstrap:** Add Application configuration and create method


<a name="5.0.0"></a>
## [5.0.0] - 2024-05-24
### Code Refactoring
- **command:** Update return types in handle method

### Docs
- **README:** Update PHP version requirement to 8.2

### Features
- **.php-cs-fixer.php:** add MIT license header and update rules
- **app:** add LogManager extension in AppServiceProvider


<a name="4.3.1"></a>
## [4.3.1] - 2024-05-23
### Pull Requests
- Merge pull request [#750](https://github.com/guanguans/music-dl/issues/750) from guanguans/dependabot/composer/laravel/prompts-0.1.22
- Merge pull request [#749](https://github.com/guanguans/music-dl/issues/749) from guanguans/dependabot/composer/rector/rector-1.1.0
- Merge pull request [#748](https://github.com/guanguans/music-dl/issues/748) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.57.2
- Merge pull request [#747](https://github.com/guanguans/music-dl/issues/747) from guanguans/dependabot/github_actions/codecov/codecov-action-4.4.1
- Merge pull request [#746](https://github.com/guanguans/music-dl/issues/746) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.57.1
- Merge pull request [#745](https://github.com/guanguans/music-dl/issues/745) from guanguans/dependabot/composer/mockery/mockery-1.6.12
- Merge pull request [#744](https://github.com/guanguans/music-dl/issues/744) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.57.0
- Merge pull request [#743](https://github.com/guanguans/music-dl/issues/743) from guanguans/dependabot/github_actions/codecov/codecov-action-4.4.0
- Merge pull request [#742](https://github.com/guanguans/music-dl/issues/742) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.8.2
- Merge pull request [#741](https://github.com/guanguans/music-dl/issues/741) from guanguans/dependabot/composer/rector/rector-1.0.5
- Merge pull request [#740](https://github.com/guanguans/music-dl/issues/740) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.56.1
- Merge pull request [#739](https://github.com/guanguans/music-dl/issues/739) from guanguans/dependabot/composer/nunomaduro/larastan-2.9.6
- Merge pull request [#738](https://github.com/guanguans/music-dl/issues/738) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.56.0
- Merge pull request [#737](https://github.com/guanguans/music-dl/issues/737) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.55.0
- Merge pull request [#736](https://github.com/guanguans/music-dl/issues/736) from guanguans/dependabot/composer/vimeo/psalm-5.24.0
- Merge pull request [#735](https://github.com/guanguans/music-dl/issues/735) from guanguans/dependabot/github_actions/codecov/codecov-action-4.3.1
- Merge pull request [#734](https://github.com/guanguans/music-dl/issues/734) from guanguans/dependabot/composer/laravel/prompts-0.1.21
- Merge pull request [#733](https://github.com/guanguans/music-dl/issues/733) from guanguans/dependabot/composer/pestphp/pest-plugin-laravel-2.4.0
- Merge pull request [#732](https://github.com/guanguans/music-dl/issues/732) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-2.1.0


<a name="4.3.0"></a>
## [4.3.0] - 2024-04-24
### Bug Fixes
- **config:** Update music-dl config key to app

### Code Refactoring
- Removed unnecessary language files and service providers from the Laravel application.
- **ServiceProvider:** Remove unnecessary code from AppServiceProvider
- **config:** Update logo and sources in app configuration
- **hydrator:** improve song hydration process
- **i18n:** update language keys for music command
- **music-dl:** update language keys for MusicCommand

### Features
- Add language pack support
- **ServiceProvider:** Add conditional registration of language-related services
- **lang:** add language option to specify the language

### Pull Requests
- Merge pull request [#731](https://github.com/guanguans/music-dl/issues/731) from guanguans/dependabot/composer/laravel/prompts-0.1.20
- Merge pull request [#730](https://github.com/guanguans/music-dl/issues/730) from guanguans/dependabot/composer/laravel-zero/framework-10.4.0
- Merge pull request [#729](https://github.com/guanguans/music-dl/issues/729) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.54.0
- Merge pull request [#728](https://github.com/guanguans/music-dl/issues/728) from guanguans/dependabot/composer/laravel/prompts-0.1.19
- Merge pull request [#727](https://github.com/guanguans/music-dl/issues/727) from guanguans/dependabot/composer/nunomaduro/larastan-2.9.5
- Merge pull request [#726](https://github.com/guanguans/music-dl/issues/726) from guanguans/dependabot/composer/nunomaduro/larastan-2.9.4
- Merge pull request [#725](https://github.com/guanguans/music-dl/issues/725) from guanguans/dependabot/github_actions/codecov/codecov-action-4.3.0
- Merge pull request [#724](https://github.com/guanguans/music-dl/issues/724) from guanguans/dependabot/composer/laravel/prompts-0.1.18
- Merge pull request [#723](https://github.com/guanguans/music-dl/issues/723) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.53.0


<a name="4.2.1"></a>
## [4.2.1] - 2024-04-07
### Features
- **box.json:** Add support for disabling requirements check


<a name="4.2.0"></a>
## [4.2.0] - 2024-04-07
### Code Refactoring
- **utils:** improve savePathFor method
- **utils:** update method names for saving files

### Features
- **composer-updater:** add dry-run option

### Pull Requests
- Merge pull request [#714](https://github.com/guanguans/music-dl/issues/714) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-2.0.0
- Merge pull request [#721](https://github.com/guanguans/music-dl/issues/721) from guanguans/dependabot/composer/rector/rector-1.04
- Merge pull request [#720](https://github.com/guanguans/music-dl/issues/720) from guanguans/dependabot/composer/pestphp/pest-2.34.7
- Merge pull request [#719](https://github.com/guanguans/music-dl/issues/719) from guanguans/dependabot/github_actions/codecov/codecov-action-4.2.0
- Merge pull request [#718](https://github.com/guanguans/music-dl/issues/718) from guanguans/dependabot/composer/pestphp/pest-2.34.6
- Merge pull request [#717](https://github.com/guanguans/music-dl/issues/717) from guanguans/dependabot/composer/laravel/prompts-0.1.17
- Merge pull request [#716](https://github.com/guanguans/music-dl/issues/716) from guanguans/dependabot/github_actions/codecov/codecov-action-4.1.1
- Merge pull request [#715](https://github.com/guanguans/music-dl/issues/715) from guanguans/dependabot/composer/pestphp/pest-2.34.5
- Merge pull request [#713](https://github.com/guanguans/music-dl/issues/713) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.7.0
- Merge pull request [#712](https://github.com/guanguans/music-dl/issues/712) from guanguans/dependabot/composer/mockery/mockery-1.6.11
- Merge pull request [#711](https://github.com/guanguans/music-dl/issues/711) from guanguans/dependabot/composer/mockery/mockery-1.6.10
- Merge pull request [#710](https://github.com/guanguans/music-dl/issues/710) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.52.1
- Merge pull request [#709](https://github.com/guanguans/music-dl/issues/709) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.52.0
- Merge pull request [#708](https://github.com/guanguans/music-dl/issues/708) from guanguans/dependabot/composer/rector/rector-1.0.3
- Merge pull request [#707](https://github.com/guanguans/music-dl/issues/707) from guanguans/dependabot/composer/pestphp/pest-2.34.4
- Merge pull request [#706](https://github.com/guanguans/music-dl/issues/706) from guanguans/dependabot/composer/mockery/mockery-1.6.9
- Merge pull request [#705](https://github.com/guanguans/music-dl/issues/705) from guanguans/dependabot/composer/vimeo/psalm-5.23.1
- Merge pull request [#704](https://github.com/guanguans/music-dl/issues/704) from guanguans/dependabot/composer/pestphp/pest-2.34.2
- Merge pull request [#703](https://github.com/guanguans/music-dl/issues/703) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.8.1
- Merge pull request [#702](https://github.com/guanguans/music-dl/issues/702) from guanguans/dependabot/composer/rector/rector-1.0.2
- Merge pull request [#701](https://github.com/guanguans/music-dl/issues/701) from guanguans/dependabot/composer/nunomaduro/larastan-2.9.2
- Merge pull request [#700](https://github.com/guanguans/music-dl/issues/700) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.51.0
- Merge pull request [#699](https://github.com/guanguans/music-dl/issues/699) from guanguans/dependabot/composer/pestphp/pest-2.34.1
- Merge pull request [#698](https://github.com/guanguans/music-dl/issues/698) from guanguans/dependabot/composer/laravel/prompts-0.1.16
- Merge pull request [#697](https://github.com/guanguans/music-dl/issues/697) from guanguans/dependabot/composer/nunomaduro/larastan-2.9.1
- Merge pull request [#696](https://github.com/guanguans/music-dl/issues/696) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.21.0
- Merge pull request [#695](https://github.com/guanguans/music-dl/issues/695) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.50.0
- Merge pull request [#694](https://github.com/guanguans/music-dl/issues/694) from guanguans/dependabot/github_actions/codecov/codecov-action-4.1.0
- Merge pull request [#693](https://github.com/guanguans/music-dl/issues/693) from guanguans/dependabot/github_actions/codecov/codecov-action-4.0.2
- Merge pull request [#692](https://github.com/guanguans/music-dl/issues/692) from guanguans/dependabot/composer/vimeo/psalm-5.22.2
- Merge pull request [#678](https://github.com/guanguans/music-dl/issues/678) from guanguans/dependabot/github_actions/codecov/codecov-action-4.0.1
- Merge pull request [#687](https://github.com/guanguans/music-dl/issues/687) from guanguans/dependabot/composer/rector/rector-1.0.1
- Merge pull request [#690](https://github.com/guanguans/music-dl/issues/690) from guanguans/dependabot/composer/pestphp/pest-2.34.0
- Merge pull request [#689](https://github.com/guanguans/music-dl/issues/689) from guanguans/dependabot/composer/pestphp/pest-plugin-laravel-2.3.0
- Merge pull request [#688](https://github.com/guanguans/music-dl/issues/688) from guanguans/dependabot/composer/vimeo/psalm-5.22.1
- Merge pull request [#686](https://github.com/guanguans/music-dl/issues/686) from guanguans/dependabot/composer/vimeo/psalm-5.22.0
- Merge pull request [#685](https://github.com/guanguans/music-dl/issues/685) from guanguans/dependabot/composer/nunomaduro/larastan-2.9.0
- Merge pull request [#684](https://github.com/guanguans/music-dl/issues/684) from guanguans/dependabot/composer/php-mock/php-mock-phpunit-2.10.0
- Merge pull request [#683](https://github.com/guanguans/music-dl/issues/683) from guanguans/dependabot/composer/pestphp/pest-2.33.6
- Merge pull request [#681](https://github.com/guanguans/music-dl/issues/681) from guanguans/dependabot/composer/rector/rector-0.19.8
- Merge pull request [#680](https://github.com/guanguans/music-dl/issues/680) from guanguans/dependabot/composer/symfony/polyfill-php83-1.29.0
- Merge pull request [#679](https://github.com/guanguans/music-dl/issues/679) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.20.0
- Merge pull request [#677](https://github.com/guanguans/music-dl/issues/677) from guanguans/dependabot/composer/pestphp/pest-2.33.4


<a name="4.1.8"></a>
## [4.1.8] - 2024-02-02
### Code Refactoring
- **composer-updater:** refactor SingleCommandApplication class

### Pull Requests
- Merge pull request [#676](https://github.com/guanguans/music-dl/issues/676) from guanguans/dependabot/composer/vimeo/psalm-5.21.1
- Merge pull request [#675](https://github.com/guanguans/music-dl/issues/675) from guanguans/dependabot/composer/vimeo/psalm-5.21.0
- Merge pull request [#673](https://github.com/guanguans/music-dl/issues/673) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.42.0
- Merge pull request [#672](https://github.com/guanguans/music-dl/issues/672) from guanguans/dependabot/composer/rector/rector-0.19.5
- Merge pull request [#671](https://github.com/guanguans/music-dl/issues/671) from guanguans/dependabot/github_actions/codecov/codecov-action-3.1.6
- Merge pull request [#670](https://github.com/guanguans/music-dl/issues/670) from guanguans/dependabot/composer/pestphp/pest-2.33.2
- Merge pull request [#669](https://github.com/guanguans/music-dl/issues/669) from guanguans/dependabot/composer/rector/rector-0.19.3
- Merge pull request [#668](https://github.com/guanguans/music-dl/issues/668) from guanguans/dependabot/composer/pestphp/pest-2.33.0
- Merge pull request [#667](https://github.com/guanguans/music-dl/issues/667) from guanguans/dependabot/github_actions/codecov/codecov-action-3.1.5
- Merge pull request [#666](https://github.com/guanguans/music-dl/issues/666) from guanguans/dependabot/composer/pestphp/pest-2.32.3
- Merge pull request [#665](https://github.com/guanguans/music-dl/issues/665) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.19.2
- Merge pull request [#613](https://github.com/guanguans/music-dl/issues/613) from guanguans/dependabot/github_actions/actions/labeler-5
- Merge pull request [#623](https://github.com/guanguans/music-dl/issues/623) from guanguans/dependabot/github_actions/actions/stale-9
- Merge pull request [#628](https://github.com/guanguans/music-dl/issues/628) from guanguans/dependabot/github_actions/actions/upload-artifact-4
- Merge pull request [#657](https://github.com/guanguans/music-dl/issues/657) from guanguans/dependabot/github_actions/actions/cache-4
- Merge pull request [#664](https://github.com/guanguans/music-dl/issues/664) from guanguans/dependabot/composer/pestphp/pest-2.32.2
- Merge pull request [#663](https://github.com/guanguans/music-dl/issues/663) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.19.1
- Merge pull request [#662](https://github.com/guanguans/music-dl/issues/662) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.48.0
- Merge pull request [#661](https://github.com/guanguans/music-dl/issues/661) from guanguans/dependabot/composer/pestphp/pest-2.32.0
- Merge pull request [#660](https://github.com/guanguans/music-dl/issues/660) from guanguans/dependabot/composer/rector/rector-0.19.2
- Merge pull request [#659](https://github.com/guanguans/music-dl/issues/659) from guanguans/dependabot/composer/vimeo/psalm-5.20.0
- Merge pull request [#658](https://github.com/guanguans/music-dl/issues/658) from guanguans/dependabot/composer/vimeo/psalm-5.19.1
- Merge pull request [#656](https://github.com/guanguans/music-dl/issues/656) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.47.1
- Merge pull request [#655](https://github.com/guanguans/music-dl/issues/655) from guanguans/dependabot/composer/rector/rector-0.19.1
- Merge pull request [#654](https://github.com/guanguans/music-dl/issues/654) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.19.0
- Merge pull request [#653](https://github.com/guanguans/music-dl/issues/653) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.47.0
- Merge pull request [#652](https://github.com/guanguans/music-dl/issues/652) from guanguans/dependabot/composer/pestphp/pest-2.31.0
- Merge pull request [#651](https://github.com/guanguans/music-dl/issues/651) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.8.0
- Merge pull request [#650](https://github.com/guanguans/music-dl/issues/650) from guanguans/dependabot/composer/vimeo/psalm-5.19.0
- Merge pull request [#649](https://github.com/guanguans/music-dl/issues/649) from guanguans/dependabot/composer/rector/rector-0.19.0
- Merge pull request [#648](https://github.com/guanguans/music-dl/issues/648) from guanguans/dependabot/composer/nunomaduro/larastan-2.8.1
- Merge pull request [#647](https://github.com/guanguans/music-dl/issues/647) from guanguans/dependabot/composer/laravel/prompts-0.1.15
- Merge pull request [#646](https://github.com/guanguans/music-dl/issues/646) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.4.2
- Merge pull request [#645](https://github.com/guanguans/music-dl/issues/645) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.7.0
- Merge pull request [#644](https://github.com/guanguans/music-dl/issues/644) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.46.0
- Merge pull request [#643](https://github.com/guanguans/music-dl/issues/643) from guanguans/dependabot/composer/nunomaduro/larastan-2.8.0
- Merge pull request [#642](https://github.com/guanguans/music-dl/issues/642) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.45.0
- Merge pull request [#641](https://github.com/guanguans/music-dl/issues/641) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.18.0
- Merge pull request [#640](https://github.com/guanguans/music-dl/issues/640) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.44.0
- Merge pull request [#639](https://github.com/guanguans/music-dl/issues/639) from guanguans/dependabot/composer/pestphp/pest-2.30.0
- Merge pull request [#638](https://github.com/guanguans/music-dl/issues/638) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.43.0
- Merge pull request [#637](https://github.com/guanguans/music-dl/issues/637) from guanguans/dependabot/composer/laravel/prompts-0.1.14
- Merge pull request [#636](https://github.com/guanguans/music-dl/issues/636) from guanguans/dependabot/composer/pestphp/pest-2.29.1
- Merge pull request [#635](https://github.com/guanguans/music-dl/issues/635) from guanguans/dependabot/composer/pestphp/pest-plugin-type-coverage-2.6.0
- Merge pull request [#634](https://github.com/guanguans/music-dl/issues/634) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.17.1
- Merge pull request [#633](https://github.com/guanguans/music-dl/issues/633) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.42.0
- Merge pull request [#632](https://github.com/guanguans/music-dl/issues/632) from guanguans/dependabot/composer/rector/rector-0.18.13
- Merge pull request [#631](https://github.com/guanguans/music-dl/issues/631) from guanguans/dependabot/composer/vimeo/psalm-5.18.0
- Merge pull request [#630](https://github.com/guanguans/music-dl/issues/630) from guanguans/dependabot/composer/pestphp/pest-2.28.1
- Merge pull request [#629](https://github.com/guanguans/music-dl/issues/629) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.41.1
- Merge pull request [#627](https://github.com/guanguans/music-dl/issues/627) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.41.0
- Merge pull request [#625](https://github.com/guanguans/music-dl/issues/625) from guanguans/dependabot/composer/mockery/mockery-1.6.7
- Merge pull request [#626](https://github.com/guanguans/music-dl/issues/626) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.41.1
- Merge pull request [#624](https://github.com/guanguans/music-dl/issues/624) from guanguans/dependabot/composer/spatie/fork-1.2.2
- Merge pull request [#622](https://github.com/guanguans/music-dl/issues/622) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.40.0
- Merge pull request [#621](https://github.com/guanguans/music-dl/issues/621) from guanguans/dependabot/composer/pestphp/pest-2.28.0
- Merge pull request [#620](https://github.com/guanguans/music-dl/issues/620) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.8.1
- Merge pull request [#619](https://github.com/guanguans/music-dl/issues/619) from guanguans/dependabot/composer/nunomaduro/larastan-2.7.0
- Merge pull request [#618](https://github.com/guanguans/music-dl/issues/618) from guanguans/dependabot/composer/php-mock/php-mock-phpunit-2.9.0
- Merge pull request [#617](https://github.com/guanguans/music-dl/issues/617) from guanguans/dependabot/composer/pestphp/pest-2.27.0
- Merge pull request [#616](https://github.com/guanguans/music-dl/issues/616) from guanguans/dependabot/composer/vimeo/psalm-5.17.0
- Merge pull request [#615](https://github.com/guanguans/music-dl/issues/615) from guanguans/dependabot/composer/rector/rector-0.18.12
- Merge pull request [#614](https://github.com/guanguans/music-dl/issues/614) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.40.2
- Merge pull request [#612](https://github.com/guanguans/music-dl/issues/612) from guanguans/dependabot/composer/pestphp/pest-2.26.0


<a name="4.1.7"></a>
## [4.1.7] - 2023-11-28
### Bug Fixes
- **MusicManager:** Update type hint for createDriver parameter

### Docs
- update README files
- **readme:** Update README.md and README-zh_CN.md

### Pull Requests
- Merge pull request [#611](https://github.com/guanguans/music-dl/issues/611) from guanguans/imgbot
- Merge pull request [#610](https://github.com/guanguans/music-dl/issues/610) from guanguans/dependabot/composer/rector/rector-0.18.11


<a name="4.1.6"></a>
## [4.1.6] - 2023-11-27
### Bug Fixes
- **coding-style:** fix arrow function usage

### Code Refactoring
- **tests:** refactor test cases
- **utils:** Remove codeCoverageIgnore comments

### Docs
- **readme:** Update README file

### Features
- **github:** Add CODE_OF_CONDUCT.md


<a name="4.1.5"></a>
## [4.1.5] - 2023-11-27
### Code Refactoring
- **commands:** refactor MusicCommand handle method

### Pull Requests
- Merge pull request [#609](https://github.com/guanguans/music-dl/issues/609) from guanguans/imgbot


<a name="4.1.4"></a>
## [4.1.4] - 2023-11-26
### Code Refactoring
- **Hydrator:** Add Hydrator trait for MusicCommand
- **MusicCommand:** refactor code for selecting keys
- **MusicCommand:** simplify song mapping
- **Sanitizer:** Update mapWithKeys to map
- **handler:** add code coverage ignore annotation to register method
- **tests:** refactor ForkMusicTest
- **tests:** refactor `Pest.php` test file

### Test
- **Feature:** fix music download error


<a name="4.1.3"></a>
## [4.1.3] - 2023-11-26
### Bug Fixes
- **Exceptions:** Remove unused annotations in Handler.php
- **tests:** Fix GuzzleHttp exception class name
- **tests:** Fix download path in MusicCommandTest

### Code Refactoring
- **MusicManager:** remove final keyword
- **SequenceMusic:** improve progress bar

### Test
- **CommitMessages:** Add commit messages for git diff output
- **Unit:** Add SanitizerTest


<a name="4.1.2"></a>
## [4.1.2] - 2023-11-25
### Bug Fixes
- **MusicCommand:** Fix type hint in mapWithKeys callback
- **commands:** Add #[\Override] attribute to schedule method

### Code Refactoring
- **HttpClientFactory:** Update nullability of httpClient
- **Music:** change return type of search method in SequenceMusic class
- **Sanitizer:** update method signature
- **app:** refactor exception handler, music facade, fork music, and music manager
- **command:** simplify MusicCommand.php
- **command:** Update MusicCommand.php
- **commands:** refactor MusicCommand.php
- **commands:** Refactor MusicCommand class


<a name="4.1.1"></a>
## [4.1.1] - 2023-11-24
### Bug Fixes
- **SequenceMusic:** Fix progress callback in createHttpClient
- **SequenceMusic:** Update progress handling in download

### Code Refactoring
- **SequenceMusic:** Remove unused imports and update progress handling
- **commands:** remove unnecessary notification
- **commands:** refactor MusicCommand
- **music:** refactor MusicCommand.php


<a name="4.1.0"></a>
## [4.1.0] - 2023-11-24
### Bug Fixes
- **app:** Filter songs without URL in SequenceMusic
- **commands:** Fix MusicCommand pipe function

### Code Refactoring
- **MusicCommand:** refactor MusicCommand class
- **app:** remove unused imports(spinner)
- **command:** refactor MusicCommand.php
- **command:** Refactor MusicCommand.php
- **command:** refactor MusicCommand.php
- **commands:** Remove async driver option
- **commands:** Remove unused import in MusicCommand

### Pull Requests
- Merge pull request [#608](https://github.com/guanguans/music-dl/issues/608) from guanguans/dependabot/composer/spatie/fork-1.2.1


<a name="4.0.1"></a>
## [4.0.1] - 2023-11-23
### Features
- **Facades:** Add Music facade


<a name="4.0.0"></a>
## [4.0.0] - 2023-11-23
### Docs
- **readme:** update PHP version requirement

### Features
- **composer:** Add laravel/facade-documenter

### Pull Requests
- Merge pull request [#607](https://github.com/guanguans/music-dl/issues/607) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.39.0
- Merge pull request [#606](https://github.com/guanguans/music-dl/issues/606) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.17.0


<a name="3.6.4"></a>
## [3.6.4] - 2023-11-17
### Code Refactoring
- **monorepo-builder:** update release workers
- **php-cs-fixer:** Change curly_braces_position to braces_position

### Pull Requests
- Merge pull request [#605](https://github.com/guanguans/music-dl/issues/605) from guanguans/dependabot/composer/rector/rector-0.18.10
- Merge pull request [#604](https://github.com/guanguans/music-dl/issues/604) from guanguans/dependabot/composer/rector/rector-0.18.8
- Merge pull request [#603](https://github.com/guanguans/music-dl/issues/603) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.38.2
- Merge pull request [#602](https://github.com/guanguans/music-dl/issues/602) from guanguans/dependabot/composer/guanguans/ai-commit-1.8.5
- Merge pull request [#601](https://github.com/guanguans/music-dl/issues/601) from guanguans/dependabot/composer/rector/rector-0.18.7
- Merge pull request [#600](https://github.com/guanguans/music-dl/issues/600) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.4.1
- Merge pull request [#599](https://github.com/guanguans/music-dl/issues/599) from guanguans/dependabot/composer/guanguans/ai-commit-1.8.4
- Merge pull request [#598](https://github.com/guanguans/music-dl/issues/598) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.3.2
- Merge pull request [#597](https://github.com/guanguans/music-dl/issues/597) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.3.1
- Merge pull request [#596](https://github.com/guanguans/music-dl/issues/596) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.38.0
- Merge pull request [#595](https://github.com/guanguans/music-dl/issues/595) from guanguans/dependabot/composer/guanguans/ai-commit-1.8.3
- Merge pull request [#594](https://github.com/guanguans/music-dl/issues/594) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.3.0
- Merge pull request [#593](https://github.com/guanguans/music-dl/issues/593) from guanguans/dependabot/composer/php-mock/php-mock-phpunit-2.8.0
- Merge pull request [#592](https://github.com/guanguans/music-dl/issues/592) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.37.1
- Merge pull request [#591](https://github.com/guanguans/music-dl/issues/591) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.36.0
- Merge pull request [#590](https://github.com/guanguans/music-dl/issues/590) from guanguans/dependabot/composer/rector/rector-0.18.6
- Merge pull request [#586](https://github.com/guanguans/music-dl/issues/586) from guanguans/dependabot/github_actions/stefanzweifel/git-auto-commit-action-5
- Merge pull request [#573](https://github.com/guanguans/music-dl/issues/573) from guanguans/dependabot/github_actions/actions/checkout-4
- Merge pull request [#588](https://github.com/guanguans/music-dl/issues/588) from guanguans/dependabot/github_actions/charmbracelet/vhs-action-2.0.1
- Merge pull request [#587](https://github.com/guanguans/music-dl/issues/587) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.35.1
- Merge pull request [#585](https://github.com/guanguans/music-dl/issues/585) from guanguans/dependabot/composer/rector/rector-0.18.5
- Merge pull request [#584](https://github.com/guanguans/music-dl/issues/584) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.34.1
- Merge pull request [#583](https://github.com/guanguans/music-dl/issues/583) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.34.0
- Merge pull request [#582](https://github.com/guanguans/music-dl/issues/582) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.30.0
- Merge pull request [#581](https://github.com/guanguans/music-dl/issues/581) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.29.0
- Merge pull request [#580](https://github.com/guanguans/music-dl/issues/580) from guanguans/dependabot/composer/rector/rector-0.18.4
- Merge pull request [#579](https://github.com/guanguans/music-dl/issues/579) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.28.0
- Merge pull request [#578](https://github.com/guanguans/music-dl/issues/578) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.27.0
- Merge pull request [#577](https://github.com/guanguans/music-dl/issues/577) from guanguans/dependabot/composer/rector/rector-0.18.3
- Merge pull request [#576](https://github.com/guanguans/music-dl/issues/576) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.26.1
- Merge pull request [#575](https://github.com/guanguans/music-dl/issues/575) from guanguans/dependabot/composer/rector/rector-0.18.2
- Merge pull request [#574](https://github.com/guanguans/music-dl/issues/574) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.25.1
- Merge pull request [#572](https://github.com/guanguans/music-dl/issues/572) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.25.0
- Merge pull request [#571](https://github.com/guanguans/music-dl/issues/571) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.24.0
- Merge pull request [#570](https://github.com/guanguans/music-dl/issues/570) from guanguans/dependabot/composer/rector/rector-0.18.1
- Merge pull request [#569](https://github.com/guanguans/music-dl/issues/569) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.8.0
- Merge pull request [#568](https://github.com/guanguans/music-dl/issues/568) from guanguans/dependabot/composer/spatie/async-1.6.0
- Merge pull request [#567](https://github.com/guanguans/music-dl/issues/567) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.2.2
- Merge pull request [#566](https://github.com/guanguans/music-dl/issues/566) from guanguans/dependabot/composer/vimeo/psalm-5.15.0
- Merge pull request [#565](https://github.com/guanguans/music-dl/issues/565) from guanguans/dependabot/composer/guanguans/ai-commit-1.8.2
- Merge pull request [#564](https://github.com/guanguans/music-dl/issues/564) from guanguans/dependabot/composer/guanguans/ai-commit-1.8.0
- Merge pull request [#563](https://github.com/guanguans/music-dl/issues/563) from guanguans/dependabot/composer/rector/rector-0.18.0
- Merge pull request [#562](https://github.com/guanguans/music-dl/issues/562) from guanguans/dependabot/composer/rector/rector-0.17.13
- Merge pull request [#561](https://github.com/guanguans/music-dl/issues/561) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.23.0
- Merge pull request [#560](https://github.com/guanguans/music-dl/issues/560) from guanguans/dependabot/composer/rector/rector-0.17.12
- Merge pull request [#559](https://github.com/guanguans/music-dl/issues/559) from guanguans/dependabot/composer/mockery/mockery-1.6.6
- Merge pull request [#558](https://github.com/guanguans/music-dl/issues/558) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.2.1
- Merge pull request [#557](https://github.com/guanguans/music-dl/issues/557) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.16.2
- Merge pull request [#556](https://github.com/guanguans/music-dl/issues/556) from guanguans/dependabot/composer/mockery/mockery-1.6.5
- Merge pull request [#555](https://github.com/guanguans/music-dl/issues/555) from guanguans/dependabot/composer/rector/rector-0.17.10
- Merge pull request [#554](https://github.com/guanguans/music-dl/issues/554) from guanguans/dependabot/composer/vimeo/psalm-5.14.1
- Merge pull request [#553](https://github.com/guanguans/music-dl/issues/553) from guanguans/dependabot/composer/vimeo/psalm-5.14.0


<a name="3.6.3"></a>
## [3.6.3] - 2023-07-30

<a name="3.6.2"></a>
## [3.6.2] - 2023-07-30
### Code Refactoring
- **Utils:** update method names to camelCase
- **rector.php:** update rules configuration
- **utils:** update default save directory logic

### Pull Requests
- Merge pull request [#552](https://github.com/guanguans/music-dl/issues/552) from guanguans/dependabot/composer/guanguans/ai-commit-1.7.6
- Merge pull request [#551](https://github.com/guanguans/music-dl/issues/551) from guanguans/dependabot/composer/guanguans/ai-commit-1.7.3
- Merge pull request [#550](https://github.com/guanguans/music-dl/issues/550) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.1.11
- Merge pull request [#549](https://github.com/guanguans/music-dl/issues/549) from guanguans/dependabot/composer/rector/rector-0.17.7


<a name="3.6.1"></a>
## [3.6.1] - 2023-07-23
### Bug Fixes
- **commands:** Fix recallSelf method calls


<a name="3.6.0"></a>
## [3.6.0] - 2023-07-23
### Bug Fixes
- **config:** Add php_unit_data_provider_return_type
- **workflows:** fix upload command in publish-phar.yml

### Features
- **monorepo-builder.php:** Add new file for monorepo configuration

### Pull Requests
- Merge pull request [#548](https://github.com/guanguans/music-dl/issues/548) from guanguans/dependabot/composer/mockery/mockery-1.6.4
- Merge pull request [#547](https://github.com/guanguans/music-dl/issues/547) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.16.0
- Merge pull request [#546](https://github.com/guanguans/music-dl/issues/546) from guanguans/dependabot/composer/mockery/mockery-1.6.3
- Merge pull request [#545](https://github.com/guanguans/music-dl/issues/545) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.22.0
- Merge pull request [#544](https://github.com/guanguans/music-dl/issues/544) from guanguans/dependabot/composer/rector/rector-0.17.6
- Merge pull request [#543](https://github.com/guanguans/music-dl/issues/543) from guanguans/dependabot/composer/guanguans/ai-commit-1.6.9


<a name="v3.5.7"></a>
## [v3.5.7] - 2023-07-14
### Bug Fixes
- **config:** update windows_tip message


<a name="v3.5.6"></a>
## [v3.5.6] - 2023-07-14
### Pull Requests
- Merge pull request [#542](https://github.com/guanguans/music-dl/issues/542) from guanguans/imgbot


<a name="v3.5.5"></a>
## [v3.5.5] - 2023-07-13
### Bug Fixes
- **commit:** adjust dimensions and typing speed
- **composer:** add ai-commit-no-verify command
- **tape:** adjust typing delay

### Code Refactoring
- **Command:** optimize logo and windows tip output
- **command:** Remove unused property

### Features
- **MusicCommand:** add --no-continue option

### Pull Requests
- Merge pull request [#541](https://github.com/guanguans/music-dl/issues/541) from guanguans/dependabot/composer/rector/rector-0.17.5
- Merge pull request [#540](https://github.com/guanguans/music-dl/issues/540) from guanguans/dependabot/composer/pestphp/pest-1.23.1


<a name="v3.5.4"></a>
## [v3.5.4] - 2023-07-12
### Code Refactoring
- **console-spinner:** update spinner characters

### Docs
- **readme:** add disclaimer for commercial use


<a name="v3.5.3"></a>
## [v3.5.3] - 2023-07-12
### Bug Fixes
- **tests:** Skip dependency on music search and download

### Code Refactoring
- **VendorPublishCommand:** make VendorPublishCommand class final
- **tests:** Update test cases and add new test file

### Docs
- **README:** update installation instructions
- **readme:** Update Chinese README

### Features
- **commands:** Add VendorPublishCommand
- **tests:** Add test to verify downloaded music exists

### Test
- **Feature:** Add MusicCommandTest

### Pull Requests
- Merge pull request [#539](https://github.com/guanguans/music-dl/issues/539) from guanguans/imgbot


<a name="v3.5.2"></a>
## [v3.5.2] - 2023-07-12
### Code Refactoring
- **AsyncMusic:** ensure songs have URL
- **AsyncMusic:** Return all songs instead of cleaning
- **AsyncMusic:** refactor the requestUrl method
- **Music:** rename methods and variables for clarity
- **SequenceMusic:** remove unused variable and simplify progress logic

### Features
- **Exceptions:** Add InvalidArgumentException class
- **Music:** Add spinner creation function in SequenceMusic
- **music:** add ForkMusic class

### Pull Requests
- Merge pull request [#538](https://github.com/guanguans/music-dl/issues/538) from guanguans/dependabot/composer/rector/rector-0.17.4


<a name="v3.5.1"></a>
## [v3.5.1] - 2023-07-11
### Bug Fixes
- **MusicCommand:** modify collection handling


<a name="v3.5.0"></a>
## [v3.5.0] - 2023-07-11
### Bug Fixes
- **Command:** Fix issue with keyword argument in MusicCommand
- **MusicManager:** Fix createDriver method throwing BindingResolutionException

### Code Refactoring
- **Music:** modify SequenceMusic class
- **MusicCommand:** update string literals
- **SequenceMusic:** Refactor ensureWithUrl and add clean method
- **command:** Improve ThanksCommand
- **config:** Update paths in .php-cs-fixer.php and rector.php
- **musicmanager:** improve default driver retrieval
- **sanitizer:** update return type in sanitizes method

### Pull Requests
- Merge pull request [#537](https://github.com/guanguans/music-dl/issues/537) from guanguans/dependabot/composer/rector/rector-0.17.3


<a name="v3.4.1"></a>
## [v3.4.1] - 2023-07-10
### Bug Fixes
- **commands:** update Windows tips

### Code Refactoring
- **Music:** Rename Music class to SequenceMusic
- **SequenceMusic:** optimize carryUrl method
- **commands:** change search driver option

### Features
- **AsyncMusic:** Improve song loading efficiency
- **Music:** Add spinner functionality to Music class
- **app:** add LaravelConsoleSpinnerServiceProvider


<a name="v3.4.0"></a>
## [v3.4.0] - 2023-07-10
### Code Refactoring
- **MusicCommand:** change 'channels' to 'sources'
- **app:** move helpers.php to app/Support
- **music:** Remove redundant code in AsyncMusic
- **music:** rename Music namespace

### Features
- **support:** add Utils class


<a name="v3.3.3"></a>
## [v3.3.3] - 2023-07-07
### Pull Requests
- Merge pull request [#532](https://github.com/guanguans/music-dl/issues/532) from guanguans/dependabot/github_actions/charmbracelet/vhs-action-2.0.0
- Merge pull request [#536](https://github.com/guanguans/music-dl/issues/536) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.21.1
- Merge pull request [#535](https://github.com/guanguans/music-dl/issues/535) from guanguans/dependabot/composer/phpstan/phpstan-1.10.25
- Merge pull request [#534](https://github.com/guanguans/music-dl/issues/534) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.21.0
- Merge pull request [#533](https://github.com/guanguans/music-dl/issues/533) from guanguans/dependabot/composer/phpstan/phpstan-1.10.24
- Merge pull request [#531](https://github.com/guanguans/music-dl/issues/531) from guanguans/dependabot/composer/phpstan/phpstan-1.10.23
- Merge pull request [#530](https://github.com/guanguans/music-dl/issues/530) from guanguans/dependabot/composer/phpstan/phpstan-1.10.22
- Merge pull request [#529](https://github.com/guanguans/music-dl/issues/529) from guanguans/dependabot/composer/rector/rector-0.17.2
- Merge pull request [#528](https://github.com/guanguans/music-dl/issues/528) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.20.0
- Merge pull request [#527](https://github.com/guanguans/music-dl/issues/527) from guanguans/dependabot/composer/vimeo/psalm-5.13.1
- Merge pull request [#526](https://github.com/guanguans/music-dl/issues/526) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.6.0
- Merge pull request [#525](https://github.com/guanguans/music-dl/issues/525) from guanguans/dependabot/composer/vimeo/psalm-5.13.0
- Merge pull request [#524](https://github.com/guanguans/music-dl/issues/524) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.19.2
- Merge pull request [#523](https://github.com/guanguans/music-dl/issues/523) from guanguans/dependabot/composer/phpstan/phpstan-1.10.21
- Merge pull request [#522](https://github.com/guanguans/music-dl/issues/522) from guanguans/dependabot/composer/phpstan/phpstan-1.10.20
- Merge pull request [#521](https://github.com/guanguans/music-dl/issues/521) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.18.0
- Merge pull request [#520](https://github.com/guanguans/music-dl/issues/520) from guanguans/dependabot/composer/nunomaduro/larastan-2.6.3
- Merge pull request [#519](https://github.com/guanguans/music-dl/issues/519) from guanguans/dependabot/composer/phpstan/phpstan-1.10.19
- Merge pull request [#518](https://github.com/guanguans/music-dl/issues/518) from guanguans/dependabot/composer/rector/rector-0.17.1
- Merge pull request [#517](https://github.com/guanguans/music-dl/issues/517) from guanguans/dependabot/composer/phpunit/phpunit-9.6.9
- Merge pull request [#516](https://github.com/guanguans/music-dl/issues/516) from guanguans/dependabot/composer/nunomaduro/larastan-2.6.2
- Merge pull request [#515](https://github.com/guanguans/music-dl/issues/515) from guanguans/dependabot/github_actions/actions/checkout-3.5.3
- Merge pull request [#514](https://github.com/guanguans/music-dl/issues/514) from guanguans/dependabot/composer/phpstan/phpstan-1.10.18
- Merge pull request [#513](https://github.com/guanguans/music-dl/issues/513) from guanguans/dependabot/composer/mockery/mockery-1.6.2
- Merge pull request [#512](https://github.com/guanguans/music-dl/issues/512) from guanguans/dependabot/composer/phpstan/phpstan-1.10.17
- Merge pull request [#507](https://github.com/guanguans/music-dl/issues/507) from guanguans/dependabot/composer/phpstan/extension-installer-1.3.1
- Merge pull request [#511](https://github.com/guanguans/music-dl/issues/511) from guanguans/dependabot/composer/nunomaduro/larastan-2.6.1
- Merge pull request [#505](https://github.com/guanguans/music-dl/issues/505) from guanguans/dependabot/composer/vimeo/psalm-5.12.0
- Merge pull request [#510](https://github.com/guanguans/music-dl/issues/510) from guanguans/dependabot/composer/phpstan/phpstan-1.10.16
- Merge pull request [#509](https://github.com/guanguans/music-dl/issues/509) from guanguans/dependabot/composer/mockery/mockery-1.6.1
- Merge pull request [#508](https://github.com/guanguans/music-dl/issues/508) from guanguans/dependabot/composer/rector/rector-0.17.0
- Merge pull request [#506](https://github.com/guanguans/music-dl/issues/506) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.5.1
- Merge pull request [#504](https://github.com/guanguans/music-dl/issues/504) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.7.0
- Merge pull request [#503](https://github.com/guanguans/music-dl/issues/503) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.17.0
- Merge pull request [#502](https://github.com/guanguans/music-dl/issues/502) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.5.0


<a name="v3.3.2"></a>
## [v3.3.2] - 2023-05-18

<a name="v3.3.1"></a>
## [v3.3.1] - 2023-05-18

<a name="v3.3.0"></a>
## [v3.3.0] - 2023-05-18
### Pull Requests
- Merge pull request [#491](https://github.com/guanguans/music-dl/issues/491) from guanguans/dependabot/composer/nunomaduro/larastan-2.6.0
- Merge pull request [#467](https://github.com/guanguans/music-dl/issues/467) from guanguans/dependabot/github_actions/actions/stale-8
- Merge pull request [#501](https://github.com/guanguans/music-dl/issues/501) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.6.1
- Merge pull request [#500](https://github.com/guanguans/music-dl/issues/500) from guanguans/dependabot/github_actions/codecov/codecov-action-3.1.4
- Merge pull request [#499](https://github.com/guanguans/music-dl/issues/499) from guanguans/dependabot/composer/phpunit/phpunit-9.6.8
- Merge pull request [#498](https://github.com/guanguans/music-dl/issues/498) from guanguans/dependabot/composer/phpstan/phpstan-1.10.15
- Merge pull request [#497](https://github.com/guanguans/music-dl/issues/497) from guanguans/dependabot/composer/react/event-loop-1.4.0
- Merge pull request [#496](https://github.com/guanguans/music-dl/issues/496) from guanguans/dependabot/composer/rector/rector-0.16.0
- Merge pull request [#495](https://github.com/guanguans/music-dl/issues/495) from guanguans/dependabot/composer/vimeo/psalm-5.11.0
- Merge pull request [#494](https://github.com/guanguans/music-dl/issues/494) from guanguans/dependabot/composer/vimeo/psalm-5.10.0
- Merge pull request [#493](https://github.com/guanguans/music-dl/issues/493) from guanguans/dependabot/github_actions/charmbracelet/vhs-action-1.2.2
- Merge pull request [#492](https://github.com/guanguans/music-dl/issues/492) from guanguans/dependabot/composer/rector/rector-0.15.25
- Merge pull request [#490](https://github.com/guanguans/music-dl/issues/490) from guanguans/dependabot/github_actions/codecov/codecov-action-3.1.3
- Merge pull request [#489](https://github.com/guanguans/music-dl/issues/489) from guanguans/dependabot/composer/pestphp/pest-1.23.0
- Merge pull request [#488](https://github.com/guanguans/music-dl/issues/488) from guanguans/dependabot/composer/phpstan/phpstan-1.10.14
- Merge pull request [#485](https://github.com/guanguans/music-dl/issues/485) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.5.1
- Merge pull request [#487](https://github.com/guanguans/music-dl/issues/487) from guanguans/dependabot/composer/guzzlehttp/psr7-2.5.0
- Merge pull request [#486](https://github.com/guanguans/music-dl/issues/486) from guanguans/dependabot/composer/phpstan/extension-installer-1.3.0
- Merge pull request [#484](https://github.com/guanguans/music-dl/issues/484) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.4.0
- Merge pull request [#483](https://github.com/guanguans/music-dl/issues/483) from guanguans/dependabot/composer/phpunit/phpunit-9.6.7
- Merge pull request [#482](https://github.com/guanguans/music-dl/issues/482) from guanguans/dependabot/github_actions/charmbracelet/vhs-action-1.2.1
- Merge pull request [#481](https://github.com/guanguans/music-dl/issues/481) from guanguans/dependabot/github_actions/actions/checkout-3.5.2
- Merge pull request [#480](https://github.com/guanguans/music-dl/issues/480) from guanguans/dependabot/composer/phpstan/phpstan-1.10.13
- Merge pull request [#479](https://github.com/guanguans/music-dl/issues/479) from guanguans/dependabot/github_actions/actions/checkout-3.5.1
- Merge pull request [#478](https://github.com/guanguans/music-dl/issues/478) from guanguans/dependabot/github_actions/codecov/codecov-action-3.1.2
- Merge pull request [#477](https://github.com/guanguans/music-dl/issues/477) from guanguans/dependabot/composer/rector/rector-0.15.24
- Merge pull request [#476](https://github.com/guanguans/music-dl/issues/476) from guanguans/dependabot/composer/phpstan/phpstan-1.10.11
- Merge pull request [#475](https://github.com/guanguans/music-dl/issues/475) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.16.0
- Merge pull request [#474](https://github.com/guanguans/music-dl/issues/474) from guanguans/dependabot/composer/phpstan/phpstan-1.10.10
- Merge pull request [#473](https://github.com/guanguans/music-dl/issues/473) from guanguans/dependabot/composer/phpstan/phpstan-1.10.9
- Merge pull request [#472](https://github.com/guanguans/music-dl/issues/472) from guanguans/dependabot/composer/vimeo/psalm-5.9.0
- Merge pull request [#471](https://github.com/guanguans/music-dl/issues/471) from guanguans/dependabot/composer/phpunit/phpunit-9.6.6
- Merge pull request [#470](https://github.com/guanguans/music-dl/issues/470) from guanguans/dependabot/composer/phpstan/phpstan-1.10.8
- Merge pull request [#469](https://github.com/guanguans/music-dl/issues/469) from guanguans/dependabot/github_actions/actions/checkout-3.5.0
- Merge pull request [#468](https://github.com/guanguans/music-dl/issues/468) from guanguans/dependabot/composer/rector/rector-0.15.23
- Merge pull request [#466](https://github.com/guanguans/music-dl/issues/466) from guanguans/dependabot/composer/pestphp/pest-1.22.6
- Merge pull request [#465](https://github.com/guanguans/music-dl/issues/465) from guanguans/dependabot/composer/phpstan/phpstan-1.10.7
- Merge pull request [#464](https://github.com/guanguans/music-dl/issues/464) from guanguans/dependabot/github_actions/actions/checkout-3.4.0
- Merge pull request [#463](https://github.com/guanguans/music-dl/issues/463) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.15.1
- Merge pull request [#462](https://github.com/guanguans/music-dl/issues/462) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.15.0
- Merge pull request [#461](https://github.com/guanguans/music-dl/issues/461) from guanguans/dependabot/composer/vimeo/psalm-5.8.0
- Merge pull request [#460](https://github.com/guanguans/music-dl/issues/460) from guanguans/dependabot/composer/phpstan/phpstan-1.10.6
- Merge pull request [#459](https://github.com/guanguans/music-dl/issues/459) from guanguans/dependabot/composer/phpunit/phpunit-9.6.5
- Merge pull request [#458](https://github.com/guanguans/music-dl/issues/458) from guanguans/dependabot/composer/phpstan/phpstan-1.10.5
- Merge pull request [#457](https://github.com/guanguans/music-dl/issues/457) from guanguans/dependabot/composer/phpstan/phpstan-1.10.4
- Merge pull request [#456](https://github.com/guanguans/music-dl/issues/456) from guanguans/dependabot/composer/nunomaduro/larastan-2.5.1
- Merge pull request [#455](https://github.com/guanguans/music-dl/issues/455) from guanguans/dependabot/composer/rector/rector-0.15.21
- Merge pull request [#454](https://github.com/guanguans/music-dl/issues/454) from guanguans/dependabot/composer/pestphp/pest-1.22.5
- Merge pull request [#453](https://github.com/guanguans/music-dl/issues/453) from guanguans/dependabot/composer/rector/rector-0.15.19
- Merge pull request [#452](https://github.com/guanguans/music-dl/issues/452) from guanguans/dependabot/composer/phpunit/phpunit-9.6.4
- Merge pull request [#451](https://github.com/guanguans/music-dl/issues/451) from guanguans/dependabot/composer/phpstan/phpstan-1.10.3
- Merge pull request [#450](https://github.com/guanguans/music-dl/issues/450) from guanguans/dependabot/composer/vimeo/psalm-5.7.7
- Merge pull request [#449](https://github.com/guanguans/music-dl/issues/449) from guanguans/dependabot/composer/vimeo/psalm-5.7.6
- Merge pull request [#448](https://github.com/guanguans/music-dl/issues/448) from guanguans/dependabot/composer/phpstan/phpstan-1.10.2
- Merge pull request [#447](https://github.com/guanguans/music-dl/issues/447) from guanguans/dependabot/composer/rector/rector-0.15.18
- Merge pull request [#446](https://github.com/guanguans/music-dl/issues/446) from guanguans/dependabot/composer/vimeo/psalm-5.7.5
- Merge pull request [#445](https://github.com/guanguans/music-dl/issues/445) from guanguans/dependabot/composer/phpstan/phpstan-1.10.1
- Merge pull request [#444](https://github.com/guanguans/music-dl/issues/444) from guanguans/dependabot/composer/vimeo/psalm-5.7.1
- Merge pull request [#443](https://github.com/guanguans/music-dl/issues/443) from guanguans/dependabot/composer/rector/rector-0.15.17
- Merge pull request [#442](https://github.com/guanguans/music-dl/issues/442) from guanguans/dependabot/composer/phpstan/phpstan-1.9.18
- Merge pull request [#441](https://github.com/guanguans/music-dl/issues/441) from guanguans/dependabot/composer/nunomaduro/larastan-2.4.1
- Merge pull request [#440](https://github.com/guanguans/music-dl/issues/440) from guanguans/dependabot/composer/rector/rector-0.15.16
- Merge pull request [#439](https://github.com/guanguans/music-dl/issues/439) from guanguans/dependabot/composer/rector/rector-0.15.15
- Merge pull request [#438](https://github.com/guanguans/music-dl/issues/438) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.14.4
- Merge pull request [#437](https://github.com/guanguans/music-dl/issues/437) from guanguans/dependabot/composer/phpstan/phpstan-1.9.17
- Merge pull request [#436](https://github.com/guanguans/music-dl/issues/436) from guanguans/dependabot/composer/rector/rector-0.15.13
- Merge pull request [#435](https://github.com/guanguans/music-dl/issues/435) from guanguans/dependabot/composer/phpstan/phpstan-1.9.16
- Merge pull request [#434](https://github.com/guanguans/music-dl/issues/434) from guanguans/dependabot/composer/phpunit/phpunit-9.6.3
- Merge pull request [#433](https://github.com/guanguans/music-dl/issues/433) from guanguans/dependabot/composer/infection/infection-0.26.19
- Merge pull request [#432](https://github.com/guanguans/music-dl/issues/432) from guanguans/dependabot/composer/rector/rector-0.15.12
- Merge pull request [#431](https://github.com/guanguans/music-dl/issues/431) from guanguans/dependabot/composer/phpunit/phpunit-9.6.1
- Merge pull request [#430](https://github.com/guanguans/music-dl/issues/430) from guanguans/dependabot/composer/pestphp/pest-1.22.4
- Merge pull request [#429](https://github.com/guanguans/music-dl/issues/429) from guanguans/dependabot/composer/rector/rector-0.15.11
- Merge pull request [#428](https://github.com/guanguans/music-dl/issues/428) from guanguans/dependabot/composer/symfony/http-kernel-6.0.20
- Merge pull request [#427](https://github.com/guanguans/music-dl/issues/427) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.14.3
- Merge pull request [#426](https://github.com/guanguans/music-dl/issues/426) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.3.6
- Merge pull request [#425](https://github.com/guanguans/music-dl/issues/425) from guanguans/dependabot/composer/rector/rector-0.15.10
- Merge pull request [#424](https://github.com/guanguans/music-dl/issues/424) from guanguans/dependabot/composer/infection/infection-0.26.18
- Merge pull request [#423](https://github.com/guanguans/music-dl/issues/423) from guanguans/dependabot/composer/vimeo/psalm-5.6.0
- Merge pull request [#422](https://github.com/guanguans/music-dl/issues/422) from guanguans/dependabot/composer/rector/rector-0.15.8
- Merge pull request [#421](https://github.com/guanguans/music-dl/issues/421) from guanguans/dependabot/composer/phpstan/phpstan-1.9.14
- Merge pull request [#420](https://github.com/guanguans/music-dl/issues/420) from guanguans/dependabot/composer/infection/infection-0.26.17
- Merge pull request [#419](https://github.com/guanguans/music-dl/issues/419) from guanguans/dependabot/composer/phpstan/phpstan-1.9.13
- Merge pull request [#418](https://github.com/guanguans/music-dl/issues/418) from guanguans/dependabot/composer/phpstan/phpstan-1.9.12
- Merge pull request [#417](https://github.com/guanguans/music-dl/issues/417) from guanguans/dependabot/composer/phpunit/phpunit-9.5.28
- Merge pull request [#416](https://github.com/guanguans/music-dl/issues/416) from guanguans/dependabot/composer/rector/rector-0.15.7
- Merge pull request [#415](https://github.com/guanguans/music-dl/issues/415) from guanguans/dependabot/composer/rector/rector-0.15.6
- Merge pull request [#414](https://github.com/guanguans/music-dl/issues/414) from guanguans/dependabot/composer/pestphp/pest-plugin-laravel-1.4.0
- Merge pull request [#413](https://github.com/guanguans/music-dl/issues/413) from guanguans/dependabot/composer/nunomaduro/larastan-2.4.0
- Merge pull request [#412](https://github.com/guanguans/music-dl/issues/412) from guanguans/dependabot/composer/phpstan/phpstan-1.9.11
- Merge pull request [#411](https://github.com/guanguans/music-dl/issues/411) from guanguans/dependabot/composer/phpstan/phpstan-1.9.9
- Merge pull request [#410](https://github.com/guanguans/music-dl/issues/410) from guanguans/dependabot/composer/nunomaduro/larastan-2.3.5
- Merge pull request [#409](https://github.com/guanguans/music-dl/issues/409) from guanguans/dependabot/composer/rector/rector-0.15.4
- Merge pull request [#408](https://github.com/guanguans/music-dl/issues/408) from guanguans/dependabot/composer/phpstan/phpstan-1.9.8
- Merge pull request [#407](https://github.com/guanguans/music-dl/issues/407) from guanguans/dependabot/composer/rector/rector-0.15.3
- Merge pull request [#396](https://github.com/guanguans/music-dl/issues/396) from guanguans/dependabot/github_actions/actions/stale-7
- Merge pull request [#406](https://github.com/guanguans/music-dl/issues/406) from guanguans/dependabot/github_actions/actions/checkout-3.3.0
- Merge pull request [#405](https://github.com/guanguans/music-dl/issues/405) from guanguans/dependabot/composer/phpstan/phpstan-1.9.7
- Merge pull request [#404](https://github.com/guanguans/music-dl/issues/404) from guanguans/dependabot/composer/phpstan/phpstan-1.9.6
- Merge pull request [#403](https://github.com/guanguans/music-dl/issues/403) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.13.2
- Merge pull request [#402](https://github.com/guanguans/music-dl/issues/402) from guanguans/dependabot/composer/nunomaduro/larastan-2.3.4
- Merge pull request [#401](https://github.com/guanguans/music-dl/issues/401) from guanguans/dependabot/composer/nunomaduro/larastan-2.3.3
- Merge pull request [#400](https://github.com/guanguans/music-dl/issues/400) from guanguans/dependabot/composer/nunomaduro/larastan-2.3.2
- Merge pull request [#399](https://github.com/guanguans/music-dl/issues/399) from guanguans/dependabot/composer/rector/rector-0.15.2
- Merge pull request [#398](https://github.com/guanguans/music-dl/issues/398) from guanguans/dependabot/composer/nunomaduro/larastan-2.3.1
- Merge pull request [#395](https://github.com/guanguans/music-dl/issues/395) from guanguans/dependabot/composer/vimeo/psalm-5.4.0
- Merge pull request [#394](https://github.com/guanguans/music-dl/issues/394) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.13.1
- Merge pull request [#393](https://github.com/guanguans/music-dl/issues/393) from guanguans/dependabot/composer/vimeo/psalm-5.3.0
- Merge pull request [#392](https://github.com/guanguans/music-dl/issues/392) from guanguans/dependabot/composer/phpstan/phpstan-1.9.4
- Merge pull request [#391](https://github.com/guanguans/music-dl/issues/391) from guanguans/dependabot/composer/rector/rector-0.15.1
- Merge pull request [#390](https://github.com/guanguans/music-dl/issues/390) from guanguans/dependabot/composer/phpstan/phpstan-1.9.3
- Merge pull request [#389](https://github.com/guanguans/music-dl/issues/389) from guanguans/dependabot/composer/vimeo/psalm-5.2.0
- Merge pull request [#388](https://github.com/guanguans/music-dl/issues/388) from guanguans/dependabot/github_actions/actions/checkout-3.2.0
- Merge pull request [#387](https://github.com/guanguans/music-dl/issues/387) from guanguans/dependabot/composer/phpunit/phpunit-9.5.27
- Merge pull request [#386](https://github.com/guanguans/music-dl/issues/386) from guanguans/dependabot/composer/pestphp/pest-1.22.3
- Merge pull request [#385](https://github.com/guanguans/music-dl/issues/385) from guanguans/dependabot/composer/rector/rector-0.15.0


<a name="v3.2.3"></a>
## [v3.2.3] - 2022-12-05

<a name="v3.2.2"></a>
## [v3.2.2] - 2022-12-04

<a name="v3.2.1"></a>
## [v3.2.1] - 2022-12-03
### Pull Requests
- Merge pull request [#382](https://github.com/guanguans/music-dl/issues/382) from guanguans/dependabot/composer/vimeo/psalm-5.0.0
- Merge pull request [#381](https://github.com/guanguans/music-dl/issues/381) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.13.0
- Merge pull request [#380](https://github.com/guanguans/music-dl/issues/380) from guanguans/dependabot/composer/vimeo/psalm-4.30.0
- Merge pull request [#379](https://github.com/guanguans/music-dl/issues/379) from guanguans/dependabot/composer/pestphp/pest-1.22.2
- Merge pull request [#378](https://github.com/guanguans/music-dl/issues/378) from guanguans/dependabot/composer/vimeo/psalm-4.30.0
- Merge pull request [#377](https://github.com/guanguans/music-dl/issues/377) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.3.5
- Merge pull request [#376](https://github.com/guanguans/music-dl/issues/376) from guanguans/dependabot/composer/nunomaduro/termwind-1.14.2
- Merge pull request [#375](https://github.com/guanguans/music-dl/issues/375) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.13.0
- Merge pull request [#374](https://github.com/guanguans/music-dl/issues/374) from guanguans/dependabot/composer/nunomaduro/termwind-1.14.1
- Merge pull request [#373](https://github.com/guanguans/music-dl/issues/373) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.12.0
- Merge pull request [#372](https://github.com/guanguans/music-dl/issues/372) from guanguans/dependabot/composer/vimeo/psalm-4.29.0


<a name="v3.2.0"></a>
## [v3.2.0] - 2022-10-09
### Pull Requests
- Merge pull request [#371](https://github.com/guanguans/music-dl/issues/371) from guanguans/dependabot/composer/vimeo/psalm-4.28.0
- Merge pull request [#370](https://github.com/guanguans/music-dl/issues/370) from guanguans/dependabot/github_actions/actions/checkout-3.1.0
- Merge pull request [#366](https://github.com/guanguans/music-dl/issues/366) from guanguans/dependabot/github_actions/actions/stale-6
- Merge pull request [#368](https://github.com/guanguans/music-dl/issues/368) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.3.4
- Merge pull request [#367](https://github.com/guanguans/music-dl/issues/367) from guanguans/dependabot/composer/laravel-zero/framework-9.2.0
- Merge pull request [#365](https://github.com/guanguans/music-dl/issues/365) from guanguans/dependabot/github_actions/codecov/codecov-action-3.1.1
- Merge pull request [#364](https://github.com/guanguans/music-dl/issues/364) from guanguans/dependabot/composer/mockery/mockery-1.5.1
- Merge pull request [#363](https://github.com/guanguans/music-dl/issues/363) from guanguans/dependabot/composer/vimeo/psalm-4.27.0
- Merge pull request [#362](https://github.com/guanguans/music-dl/issues/362) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.11.0
- Merge pull request [#361](https://github.com/guanguans/music-dl/issues/361) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.5.0
- Merge pull request [#360](https://github.com/guanguans/music-dl/issues/360) from guanguans/dependabot/composer/pestphp/pest-1.22.1
- Merge pull request [#359](https://github.com/guanguans/music-dl/issues/359) from guanguans/dependabot/composer/laravel-zero/framework-9.1.3
- Merge pull request [#358](https://github.com/guanguans/music-dl/issues/358) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.10.0
- Merge pull request [#357](https://github.com/guanguans/music-dl/issues/357) from guanguans/dependabot/composer/vimeo/psalm-4.26.0
- Merge pull request [#356](https://github.com/guanguans/music-dl/issues/356) from guanguans/dependabot/composer/nunomaduro/termwind-1.14.0
- Merge pull request [#355](https://github.com/guanguans/music-dl/issues/355) from guanguans/dependabot/composer/vimeo/psalm-4.25.0
- Merge pull request [#354](https://github.com/guanguans/music-dl/issues/354) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.9.5
- Merge pull request [#353](https://github.com/guanguans/music-dl/issues/353) from guanguans/dependabot/composer/laravel-zero/framework-9.1.2
- Merge pull request [#352](https://github.com/guanguans/music-dl/issues/352) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.9.4


<a name="v3.1.6"></a>
## [v3.1.6] - 2022-07-14

<a name="v3.1.5"></a>
## [v3.1.5] - 2022-07-14
### Pull Requests
- Merge pull request [#351](https://github.com/guanguans/music-dl/issues/351) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.9.3
- Merge pull request [#350](https://github.com/guanguans/music-dl/issues/350) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.9.2
- Merge pull request [#348](https://github.com/guanguans/music-dl/issues/348) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.3.3
- Merge pull request [#349](https://github.com/guanguans/music-dl/issues/349) from guanguans/dependabot/composer/nunomaduro/termwind-1.13.0
- Merge pull request [#347](https://github.com/guanguans/music-dl/issues/347) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.3.2
- Merge pull request [#346](https://github.com/guanguans/music-dl/issues/346) from guanguans/dependabot/composer/nunomaduro/termwind-1.12.0
- Merge pull request [#345](https://github.com/guanguans/music-dl/issues/345) from guanguans/dependabot/composer/vimeo/psalm-4.24.0
- Merge pull request [#344](https://github.com/guanguans/music-dl/issues/344) from guanguans/dependabot/composer/spatie/async-1.5.5
- Merge pull request [#343](https://github.com/guanguans/music-dl/issues/343) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.4.5
- Merge pull request [#342](https://github.com/guanguans/music-dl/issues/342) from guanguans/dependabot/composer/nunomaduro/termwind-1.11.1


<a name="v3.1.4"></a>
## [v3.1.4] - 2022-06-14
### Pull Requests
- Merge pull request [#341](https://github.com/guanguans/music-dl/issues/341) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.4.4


<a name="v3.1.3"></a>
## [v3.1.3] - 2022-05-27

<a name="v3.1.2"></a>
## [v3.1.2] - 2022-05-27

<a name="v3.1.1"></a>
## [v3.1.1] - 2022-05-27
### Pull Requests
- Merge pull request [#340](https://github.com/guanguans/music-dl/issues/340) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.4.3


<a name="v3.1.0"></a>
## [v3.1.0] - 2022-05-25
### Pull Requests
- Merge pull request [#338](https://github.com/guanguans/music-dl/issues/338) from guanguans/dependabot/composer/pestphp/pest-1.21.3
- Merge pull request [#337](https://github.com/guanguans/music-dl/issues/337) from guanguans/dependabot/composer/nunomaduro/termwind-1.10.1
- Merge pull request [#335](https://github.com/guanguans/music-dl/issues/335) from guanguans/dependabot/composer/vimeo/psalm-4.23.0
- Merge pull request [#334](https://github.com/guanguans/music-dl/issues/334) from guanguans/dependabot/composer/nunomaduro/termwind-1.8.0
- Merge pull request [#333](https://github.com/guanguans/music-dl/issues/333) from guanguans/dependabot/github_actions/codecov/codecov-action-3.1.0
- Merge pull request [#332](https://github.com/guanguans/music-dl/issues/332) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.3.1
- Merge pull request [#331](https://github.com/guanguans/music-dl/issues/331) from guanguans/dependabot/github_actions/codecov/codecov-action-3.0.0
- Merge pull request [#329](https://github.com/guanguans/music-dl/issues/329) from guanguans/dependabot/composer/nunomaduro/termwind-1.7.0
- Merge pull request [#328](https://github.com/guanguans/music-dl/issues/328) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.8.0
- Merge pull request [#327](https://github.com/guanguans/music-dl/issues/327) from guanguans/dependabot/composer/guzzlehttp/guzzle-7.4.2
- Merge pull request [#326](https://github.com/guanguans/music-dl/issues/326) from guanguans/dependabot/composer/nunomaduro/termwind-1.6.2
- Merge pull request [#325](https://github.com/guanguans/music-dl/issues/325) from guanguans/dependabot/github_actions/actions/cache-3


<a name="v3.0.10"></a>
## [v3.0.10] - 2022-03-22

<a name="v3.0.9"></a>
## [v3.0.9] - 2022-03-20

<a name="v3.0.8"></a>
## [v3.0.8] - 2022-03-20

<a name="v3.0.7"></a>
## [v3.0.7] - 2022-03-20
### Pull Requests
- Merge pull request [#324](https://github.com/guanguans/music-dl/issues/324) from guanguans/imgbot


<a name="v3.0.6"></a>
## [v3.0.6] - 2022-03-20

<a name="v3.0.5"></a>
## [v3.0.5] - 2022-03-19

<a name="v3.0.4"></a>
## [v3.0.4] - 2022-03-19
### Pull Requests
- Merge pull request [#323](https://github.com/guanguans/music-dl/issues/323) from guanguans/imgbot


<a name="v3.0.3"></a>
## [v3.0.3] - 2022-03-19

<a name="v3.0.2"></a>
## [v3.0.2] - 2022-03-19
### Pull Requests
- Merge pull request [#322](https://github.com/guanguans/music-dl/issues/322) from guanguans/dependabot/github_actions/actions/labeler-4
- Merge pull request [#320](https://github.com/guanguans/music-dl/issues/320) from guanguans/dependabot/github_actions/actions/stale-5
- Merge pull request [#321](https://github.com/guanguans/music-dl/issues/321) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-1.3.0


<a name="v3.0.1"></a>
## [v3.0.1] - 2022-03-18

<a name="v3.0.0"></a>
## [v3.0.0] - 2022-03-18

<a name="v3.0.0-rc3"></a>
## [v3.0.0-rc3] - 2022-03-18

<a name="v3.0.0-rc2"></a>
## [v3.0.0-rc2] - 2022-03-18

<a name="v3.0.0-rc1"></a>
## [v3.0.0-rc1] - 2022-03-18

<a name="v3.0.0-beta3"></a>
## [v3.0.0-beta3] - 2022-03-18

<a name="v3.0.0-beta2"></a>
## [v3.0.0-beta2] - 2022-03-18

<a name="v3.0.0-beta1"></a>
## [v3.0.0-beta1] - 2022-03-18
### Pull Requests
- Merge pull request [#45](https://github.com/guanguans/music-dl/issues/45) from guanguans/dependabot/composer/phpunit/phpunit-approx-7or-approx-8or-approx-0


<a name="v2.1.6"></a>
## [v2.1.6] - 2021-09-30
### Pull Requests
- Merge pull request [#44](https://github.com/guanguans/music-dl/issues/44) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-tw-2.1or-tw-3.0
- Merge pull request [#42](https://github.com/guanguans/music-dl/issues/42) from guanguans/dependabot/composer/guzzlehttp/guzzle-tw-6.3or-tw-7.0


<a name="v2.1.5"></a>
## [v2.1.5] - 2021-07-07

<a name="v2.1.4"></a>
## [v2.1.4] - 2021-06-15

<a name="v2.1.3"></a>
## [v2.1.3] - 2021-04-23
### Bug Fixes
- Remove xiami platform support


<a name="v2.1.2"></a>
## [v2.1.2] - 2020-08-31
### Pull Requests
- Merge pull request [#33](https://github.com/guanguans/music-dl/issues/33) from guanguans/imgbot
- Merge pull request [#39](https://github.com/guanguans/music-dl/issues/39) from guanguans/analysis-1b2l5A
- Merge pull request [#40](https://github.com/guanguans/music-dl/issues/40) from guanguans/multi_progress


<a name="v2.1.1"></a>
## [v2.1.1] - 2020-08-28

<a name="v2.1.0"></a>
## [v2.1.0] - 2020-02-12

<a name="v2.0.0"></a>
## [v2.0.0] - 2020-02-11
### Docs
- add luokuncool as a contributor ([#16](https://github.com/guanguans/music-dl/issues/16))
- create .all-contributorsrc
- update README.md


<a name="v1.1.7"></a>
## [v1.1.7] - 2019-06-23

<a name="v1.1.6"></a>
## [v1.1.6] - 2019-06-17

<a name="v1.1.5"></a>
## [v1.1.5] - 2019-06-16

<a name="v1.1.4"></a>
## [v1.1.4] - 2019-06-15

<a name="v1.1.3"></a>
## [v1.1.3] - 2019-06-13

<a name="v1.1.2"></a>
## [v1.1.2] - 2019-06-01

<a name="v1.1.1"></a>
## [v1.1.1] - 2019-06-01

<a name="v1.1.0"></a>
## [v1.1.0] - 2019-05-31

<a name="v1.0.2"></a>
## [v1.0.2] - 2019-05-30

<a name="v1.0.1"></a>
## [v1.0.1] - 2019-05-27

<a name="v1.0.0"></a>
## v1.0.0 - 2019-05-23

[Unreleased]: https://github.com/guanguans/music-dl/compare/5.3.1...HEAD
[5.3.1]: https://github.com/guanguans/music-dl/compare/5.3.0...5.3.1
[5.3.0]: https://github.com/guanguans/music-dl/compare/5.2.9...5.3.0
[5.2.9]: https://github.com/guanguans/music-dl/compare/5.2.8...5.2.9
[5.2.8]: https://github.com/guanguans/music-dl/compare/5.2.7...5.2.8
[5.2.7]: https://github.com/guanguans/music-dl/compare/5.2.6...5.2.7
[5.2.6]: https://github.com/guanguans/music-dl/compare/5.2.5...5.2.6
[5.2.5]: https://github.com/guanguans/music-dl/compare/5.2.4...5.2.5
[5.2.4]: https://github.com/guanguans/music-dl/compare/5.2.3...5.2.4
[5.2.3]: https://github.com/guanguans/music-dl/compare/5.2.2...5.2.3
[5.2.2]: https://github.com/guanguans/music-dl/compare/5.2.1...5.2.2
[5.2.1]: https://github.com/guanguans/music-dl/compare/5.2.0...5.2.1
[5.2.0]: https://github.com/guanguans/music-dl/compare/5.1.4...5.2.0
[5.1.4]: https://github.com/guanguans/music-dl/compare/5.1.3...5.1.4
[5.1.3]: https://github.com/guanguans/music-dl/compare/5.1.2...5.1.3
[5.1.2]: https://github.com/guanguans/music-dl/compare/5.1.1...5.1.2
[5.1.1]: https://github.com/guanguans/music-dl/compare/5.1.0...5.1.1
[5.1.0]: https://github.com/guanguans/music-dl/compare/5.0.2...5.1.0
[5.0.2]: https://github.com/guanguans/music-dl/compare/5.0.1...5.0.2
[5.0.1]: https://github.com/guanguans/music-dl/compare/5.0.0...5.0.1
[5.0.0]: https://github.com/guanguans/music-dl/compare/4.3.1...5.0.0
[4.3.1]: https://github.com/guanguans/music-dl/compare/4.3.0...4.3.1
[4.3.0]: https://github.com/guanguans/music-dl/compare/4.2.1...4.3.0
[4.2.1]: https://github.com/guanguans/music-dl/compare/4.2.0...4.2.1
[4.2.0]: https://github.com/guanguans/music-dl/compare/4.1.8...4.2.0
[4.1.8]: https://github.com/guanguans/music-dl/compare/4.1.7...4.1.8
[4.1.7]: https://github.com/guanguans/music-dl/compare/4.1.6...4.1.7
[4.1.6]: https://github.com/guanguans/music-dl/compare/4.1.5...4.1.6
[4.1.5]: https://github.com/guanguans/music-dl/compare/4.1.4...4.1.5
[4.1.4]: https://github.com/guanguans/music-dl/compare/4.1.3...4.1.4
[4.1.3]: https://github.com/guanguans/music-dl/compare/4.1.2...4.1.3
[4.1.2]: https://github.com/guanguans/music-dl/compare/4.1.1...4.1.2
[4.1.1]: https://github.com/guanguans/music-dl/compare/4.1.0...4.1.1
[4.1.0]: https://github.com/guanguans/music-dl/compare/4.0.1...4.1.0
[4.0.1]: https://github.com/guanguans/music-dl/compare/4.0.0...4.0.1
[4.0.0]: https://github.com/guanguans/music-dl/compare/3.6.4...4.0.0
[3.6.4]: https://github.com/guanguans/music-dl/compare/3.6.3...3.6.4
[3.6.3]: https://github.com/guanguans/music-dl/compare/3.6.2...3.6.3
[3.6.2]: https://github.com/guanguans/music-dl/compare/3.6.1...3.6.2
[3.6.1]: https://github.com/guanguans/music-dl/compare/3.6.0...3.6.1
[3.6.0]: https://github.com/guanguans/music-dl/compare/v3.5.7...3.6.0
[v3.5.7]: https://github.com/guanguans/music-dl/compare/v3.5.6...v3.5.7
[v3.5.6]: https://github.com/guanguans/music-dl/compare/v3.5.5...v3.5.6
[v3.5.5]: https://github.com/guanguans/music-dl/compare/v3.5.4...v3.5.5
[v3.5.4]: https://github.com/guanguans/music-dl/compare/v3.5.3...v3.5.4
[v3.5.3]: https://github.com/guanguans/music-dl/compare/v3.5.2...v3.5.3
[v3.5.2]: https://github.com/guanguans/music-dl/compare/v3.5.1...v3.5.2
[v3.5.1]: https://github.com/guanguans/music-dl/compare/v3.5.0...v3.5.1
[v3.5.0]: https://github.com/guanguans/music-dl/compare/v3.4.1...v3.5.0
[v3.4.1]: https://github.com/guanguans/music-dl/compare/v3.4.0...v3.4.1
[v3.4.0]: https://github.com/guanguans/music-dl/compare/v3.3.3...v3.4.0
[v3.3.3]: https://github.com/guanguans/music-dl/compare/v3.3.2...v3.3.3
[v3.3.2]: https://github.com/guanguans/music-dl/compare/v3.3.1...v3.3.2
[v3.3.1]: https://github.com/guanguans/music-dl/compare/v3.3.0...v3.3.1
[v3.3.0]: https://github.com/guanguans/music-dl/compare/v3.2.3...v3.3.0
[v3.2.3]: https://github.com/guanguans/music-dl/compare/v3.2.2...v3.2.3
[v3.2.2]: https://github.com/guanguans/music-dl/compare/v3.2.1...v3.2.2
[v3.2.1]: https://github.com/guanguans/music-dl/compare/v3.2.0...v3.2.1
[v3.2.0]: https://github.com/guanguans/music-dl/compare/v3.1.6...v3.2.0
[v3.1.6]: https://github.com/guanguans/music-dl/compare/v3.1.5...v3.1.6
[v3.1.5]: https://github.com/guanguans/music-dl/compare/v3.1.4...v3.1.5
[v3.1.4]: https://github.com/guanguans/music-dl/compare/v3.1.3...v3.1.4
[v3.1.3]: https://github.com/guanguans/music-dl/compare/v3.1.2...v3.1.3
[v3.1.2]: https://github.com/guanguans/music-dl/compare/v3.1.1...v3.1.2
[v3.1.1]: https://github.com/guanguans/music-dl/compare/v3.1.0...v3.1.1
[v3.1.0]: https://github.com/guanguans/music-dl/compare/v3.0.10...v3.1.0
[v3.0.10]: https://github.com/guanguans/music-dl/compare/v3.0.9...v3.0.10
[v3.0.9]: https://github.com/guanguans/music-dl/compare/v3.0.8...v3.0.9
[v3.0.8]: https://github.com/guanguans/music-dl/compare/v3.0.7...v3.0.8
[v3.0.7]: https://github.com/guanguans/music-dl/compare/v3.0.6...v3.0.7
[v3.0.6]: https://github.com/guanguans/music-dl/compare/v3.0.5...v3.0.6
[v3.0.5]: https://github.com/guanguans/music-dl/compare/v3.0.4...v3.0.5
[v3.0.4]: https://github.com/guanguans/music-dl/compare/v3.0.3...v3.0.4
[v3.0.3]: https://github.com/guanguans/music-dl/compare/v3.0.2...v3.0.3
[v3.0.2]: https://github.com/guanguans/music-dl/compare/v3.0.1...v3.0.2
[v3.0.1]: https://github.com/guanguans/music-dl/compare/v3.0.0...v3.0.1
[v3.0.0]: https://github.com/guanguans/music-dl/compare/v3.0.0-rc3...v3.0.0
[v3.0.0-rc3]: https://github.com/guanguans/music-dl/compare/v3.0.0-rc2...v3.0.0-rc3
[v3.0.0-rc2]: https://github.com/guanguans/music-dl/compare/v3.0.0-rc1...v3.0.0-rc2
[v3.0.0-rc1]: https://github.com/guanguans/music-dl/compare/v3.0.0-beta3...v3.0.0-rc1
[v3.0.0-beta3]: https://github.com/guanguans/music-dl/compare/v3.0.0-beta2...v3.0.0-beta3
[v3.0.0-beta2]: https://github.com/guanguans/music-dl/compare/v3.0.0-beta1...v3.0.0-beta2
[v3.0.0-beta1]: https://github.com/guanguans/music-dl/compare/v2.1.6...v3.0.0-beta1
[v2.1.6]: https://github.com/guanguans/music-dl/compare/v2.1.5...v2.1.6
[v2.1.5]: https://github.com/guanguans/music-dl/compare/v2.1.4...v2.1.5
[v2.1.4]: https://github.com/guanguans/music-dl/compare/v2.1.3...v2.1.4
[v2.1.3]: https://github.com/guanguans/music-dl/compare/v2.1.2...v2.1.3
[v2.1.2]: https://github.com/guanguans/music-dl/compare/v2.1.1...v2.1.2
[v2.1.1]: https://github.com/guanguans/music-dl/compare/v2.1.0...v2.1.1
[v2.1.0]: https://github.com/guanguans/music-dl/compare/v2.0.0...v2.1.0
[v2.0.0]: https://github.com/guanguans/music-dl/compare/v1.1.7...v2.0.0
[v1.1.7]: https://github.com/guanguans/music-dl/compare/v1.1.6...v1.1.7
[v1.1.6]: https://github.com/guanguans/music-dl/compare/v1.1.5...v1.1.6
[v1.1.5]: https://github.com/guanguans/music-dl/compare/v1.1.4...v1.1.5
[v1.1.4]: https://github.com/guanguans/music-dl/compare/v1.1.3...v1.1.4
[v1.1.3]: https://github.com/guanguans/music-dl/compare/v1.1.2...v1.1.3
[v1.1.2]: https://github.com/guanguans/music-dl/compare/v1.1.1...v1.1.2
[v1.1.1]: https://github.com/guanguans/music-dl/compare/v1.1.0...v1.1.1
[v1.1.0]: https://github.com/guanguans/music-dl/compare/v1.0.2...v1.1.0
[v1.0.2]: https://github.com/guanguans/music-dl/compare/v1.0.1...v1.0.2
[v1.0.1]: https://github.com/guanguans/music-dl/compare/v1.0.0...v1.0.1
