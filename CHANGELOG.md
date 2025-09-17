<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

<a name="unreleased"></a>
## [Unreleased]


<a name="6.2.3"></a>
## [6.2.3] - 2025-09-17
### 💅 Code Refactorings
- **bootstrap:** improve app.php with inspection annotations and boot enhancements ([d887bd7](https://github.com/guanguans/music-dl/commit/d887bd7))


<a name="6.2.2"></a>
## [6.2.2] - 2025-09-17
### 💅 Code Refactorings
- **Music:** remove default value for sources in search method ([024101d](https://github.com/guanguans/music-dl/commit/024101d))
- **logging:** replace custom logger extension with official log service providers ([2dc20d0](https://github.com/guanguans/music-dl/commit/2dc20d0))


<a name="6.2.1"></a>
## [6.2.1] - 2025-09-16
### 📖 Documents
- **readme:** update music-dl help usage and options for clarity ([aca85d8](https://github.com/guanguans/music-dl/commit/aca85d8))

### ✅ Tests
- **app:** add code coverage ignore annotations to improve test coverage reports ([31870d5](https://github.com/guanguans/music-dl/commit/31870d5))
- **commands:** add TestCommand with validation and related unit tests ([80f6bac](https://github.com/guanguans/music-dl/commit/80f6bac))
- **phpunit:** Standardize path notations ([5dba658](https://github.com/guanguans/music-dl/commit/5dba658))
- **support:** add unit tests for `classes` and `make` helpers ([c96d2c9](https://github.com/guanguans/music-dl/commit/c96d2c9))


<a name="6.2.0"></a>
## [6.2.0] - 2025-09-16
### ✨ Features
- **command:** Add xdebug and dynamic configuration options ([e78d589](https://github.com/guanguans/music-dl/commit/e78d589))
- **config:** Add laravel-console-summary configuration file ([b815f25](https://github.com/guanguans/music-dl/commit/b815f25))

### 🐞 Bug Fixes
- **command:** Simplify logo output and update version retrieval ([2266f5b](https://github.com/guanguans/music-dl/commit/2266f5b))

### 💅 Code Refactorings
- apply inspection ([5a9484a](https://github.com/guanguans/music-dl/commit/5a9484a))
- **application:** Enhance OutputStyle and ConsoleLogger initialization ([bf471d5](https://github.com/guanguans/music-dl/commit/bf471d5))
- **command:** Reorder initialization in MusicCommand and ThanksCommand ([0ab7cb9](https://github.com/guanguans/music-dl/commit/0ab7cb9))
- **gitattributes:** Update export-ignore rules ([01f5e58](https://github.com/guanguans/music-dl/commit/01f5e58))
- **hydrator:** Replace Arr::except with Collection methods ([5329c5e](https://github.com/guanguans/music-dl/commit/5329c5e))


<a name="6.1.0"></a>
## [6.1.0] - 2025-09-16
### 🐞 Bug Fixes
- **command:** Rename option --dir to --directory ([1f5938b](https://github.com/guanguans/music-dl/commit/1f5938b))

### 🎨 Styles
- apply php-cs-fixer ([e3fc836](https://github.com/guanguans/music-dl/commit/e3fc836))

### 💅 Code Refactorings
- **command:** Rename option --no-continue to --break ([fa4da98](https://github.com/guanguans/music-dl/commit/fa4da98))
- **config:** Upgrade PHP requirement to 8.4 ([382d140](https://github.com/guanguans/music-dl/commit/382d140))
- **music:** Rename lang option to locale and move break ([7a0a4a8](https://github.com/guanguans/music-dl/commit/7a0a4a8))
- **music-command:** Add short option aliases and set default locale ([02d749b](https://github.com/guanguans/music-dl/commit/02d749b))

### ✅ Tests
- **tests:** Update test helpers and Arch tests ([6543564](https://github.com/guanguans/music-dl/commit/6543564))


<a name="6.0.4"></a>
## [6.0.4] - 2025-09-15

<a name="6.0.3"></a>
## [6.0.3] - 2025-09-15

<a name="6.0.2"></a>
## [6.0.2] - 2025-09-15

<a name="6.0.1"></a>
## [6.0.1] - 2025-09-15

<a name="6.0.0"></a>
## [6.0.0] - 2025-09-15
### 💅 Code Refactorings
- apply rector ([d39738f](https://github.com/guanguans/music-dl/commit/d39738f))
- **Music.php:** Update method annotations and linting rules ([88df2c2](https://github.com/guanguans/music-dl/commit/88df2c2))


<a name="5.3.6"></a>
## [5.3.6] - 2025-09-15
### 🐞 Bug Fixes
- **lang:** Correct keyword placeholder in language file ([51466b2](https://github.com/guanguans/music-dl/commit/51466b2))

### Pull Requests
- Merge pull request [#861](https://github.com/guanguans/music-dl/issues/861) from guanguans/dependabot/github_actions/actions/labeler-6
- Merge pull request [#860](https://github.com/guanguans/music-dl/issues/860) from guanguans/dependabot/github_actions/actions/setup-node-5
- Merge pull request [#859](https://github.com/guanguans/music-dl/issues/859) from guanguans/dependabot/github_actions/actions/stale-10
- Merge pull request [#858](https://github.com/guanguans/music-dl/issues/858) from guanguans/dependabot/github_actions/actions/checkout-5
- Merge pull request [#857](https://github.com/guanguans/music-dl/issues/857) from guanguans/dependabot/github_actions/stefanzweifel/git-auto-commit-action-6
- Merge pull request [#856](https://github.com/guanguans/music-dl/issues/856) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-2.4.0


<a name="5.3.5"></a>
## [5.3.5] - 2025-02-05
### 🐞 Bug Fixes
- **music:** Remove sorting criteria for songs ([4c29c75](https://github.com/guanguans/music-dl/commit/4c29c75))


<a name="5.3.4"></a>
## [5.3.4] - 2025-02-05
### 🐞 Bug Fixes
- **lang:** Update English labels in JSON file ([b24489f](https://github.com/guanguans/music-dl/commit/b24489f))

### 🤖 Continuous Integrations
- **composer:** Add PHPStan dependency to composer.json ([599e483](https://github.com/guanguans/music-dl/commit/599e483))


<a name="5.3.3"></a>
## [5.3.3] - 2025-02-04
### 🐞 Bug Fixes
- **config:** switch locale and fallback_locale settings ([b759137](https://github.com/guanguans/music-dl/commit/b759137))
- **lang:** Update translations from Chinese to English ([c4f1be1](https://github.com/guanguans/music-dl/commit/c4f1be1))

### 🤖 Continuous Integrations
- **composer-updater:** Refactor constructor properties to readonly ([c54c544](https://github.com/guanguans/music-dl/commit/c54c544))
- **license:** Update copyright year to 2025 ([ca9670a](https://github.com/guanguans/music-dl/commit/ca9670a))
- **workflows:** Update PHP version in workflow and dependencies ([78672a5](https://github.com/guanguans/music-dl/commit/78672a5))

### Pull Requests
- Merge pull request [#854](https://github.com/guanguans/music-dl/issues/854) from guanguans/dependabot/composer/rector/swiss-knife-2.1.7
- Merge pull request [#853](https://github.com/guanguans/music-dl/issues/853) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.42.2
- Merge pull request [#852](https://github.com/guanguans/music-dl/issues/852) from guanguans/dependabot/composer/laravel/prompts-0.3.4
- Merge pull request [#851](https://github.com/guanguans/music-dl/issues/851) from guanguans/dependabot/composer/spatie/fork-1.2.4
- Merge pull request [#850](https://github.com/guanguans/music-dl/issues/850) from guanguans/dependabot/github_actions/dependabot/fetch-metadata-2.3.0
- Merge pull request [#849](https://github.com/guanguans/music-dl/issues/849) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.42.1
- Merge pull request [#848](https://github.com/guanguans/music-dl/issues/848) from guanguans/dependabot/composer/rector/swiss-knife-2.1.6
- Merge pull request [#847](https://github.com/guanguans/music-dl/issues/847) from guanguans/dependabot/composer/dg/bypass-finals-1.9.0
- Merge pull request [#846](https://github.com/guanguans/music-dl/issues/846) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.42.0
- Merge pull request [#845](https://github.com/guanguans/music-dl/issues/845) from guanguans/dependabot/composer/laravel/prompts-0.3.3
- Merge pull request [#844](https://github.com/guanguans/music-dl/issues/844) from guanguans/dependabot/composer/rector/swiss-knife-2.1.5
- Merge pull request [#842](https://github.com/guanguans/music-dl/issues/842) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.41.0
- Merge pull request [#841](https://github.com/guanguans/music-dl/issues/841) from guanguans/dependabot/composer/rector/swiss-knife-2.1.1
- Merge pull request [#840](https://github.com/guanguans/music-dl/issues/840) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.40.0
- Merge pull request [#839](https://github.com/guanguans/music-dl/issues/839) from guanguans/dependabot/composer/rector/swiss-knife-2.1.0
- Merge pull request [#838](https://github.com/guanguans/music-dl/issues/838) from guanguans/dependabot/composer/rector/swiss-knife-2.0.8
- Merge pull request [#837](https://github.com/guanguans/music-dl/issues/837) from guanguans/dependabot/composer/laravel-zero/framework-11.36.1
- Merge pull request [#836](https://github.com/guanguans/music-dl/issues/836) from guanguans/dependabot/composer/rector/swiss-knife-2.0.3
- Merge pull request [#835](https://github.com/guanguans/music-dl/issues/835) from guanguans/dependabot/composer/rector/swiss-knife-2.0.2
- Merge pull request [#834](https://github.com/guanguans/music-dl/issues/834) from guanguans/dependabot/composer/spatie/fork-1.2.3
- Merge pull request [#833](https://github.com/guanguans/music-dl/issues/833) from guanguans/dependabot/composer/league/commonmark-2.6.0
- Merge pull request [#832](https://github.com/guanguans/music-dl/issues/832) from guanguans/dependabot/composer/driftingly/rector-laravel-1.2.6
- Merge pull request [#831](https://github.com/guanguans/music-dl/issues/831) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.45.0
- Merge pull request [#828](https://github.com/guanguans/music-dl/issues/828) from guanguans/dependabot/github_actions/codecov/codecov-action-5
- Merge pull request [#830](https://github.com/guanguans/music-dl/issues/830) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.39.0
- Merge pull request [#829](https://github.com/guanguans/music-dl/issues/829) from guanguans/dependabot/composer/ergebnis/license-2.6.0
- Merge pull request [#827](https://github.com/guanguans/music-dl/issues/827) from guanguans/dependabot/composer/larastan/larastan-2.9.11
- Merge pull request [#826](https://github.com/guanguans/music-dl/issues/826) from guanguans/dependabot/composer/laravel/prompts-0.3.2
- Merge pull request [#825](https://github.com/guanguans/music-dl/issues/825) from guanguans/dependabot/composer/laravel-zero/framework-11.0.3
- Merge pull request [#823](https://github.com/guanguans/music-dl/issues/823) from guanguans/dependabot/composer/rector/rector-1.2.10
- Merge pull request [#822](https://github.com/guanguans/music-dl/issues/822) from guanguans/dependabot/composer/laravel/prompts-0.3.1


<a name="5.3.2"></a>
## [5.3.2] - 2024-11-08
### 📦 Builds
- **updater:** Refactor command output handling and add ai-commit generators ([a290fd4](https://github.com/guanguans/music-dl/commit/a290fd4))

### Pull Requests
- Merge pull request [#821](https://github.com/guanguans/music-dl/issues/821) from guanguans/dependabot/composer/symfony/process-7.1.7
- Merge pull request [#820](https://github.com/guanguans/music-dl/issues/820) from guanguans/dependabot/composer/symfony/http-foundation-7.1.7
- Merge pull request [#819](https://github.com/guanguans/music-dl/issues/819) from guanguans/dependabot/composer/larastan/larastan-2.9.10
- Merge pull request [#818](https://github.com/guanguans/music-dl/issues/818) from guanguans/dependabot/composer/rector/rector-1.2.9
- Merge pull request [#817](https://github.com/guanguans/music-dl/issues/817) from guanguans/dependabot/composer/driftingly/rector-laravel-1.2.5
- Merge pull request [#816](https://github.com/guanguans/music-dl/issues/816) from guanguans/dependabot/composer/rector/rector-1.2.8


<a name="5.3.1"></a>
## [5.3.1] - 2024-10-17
### 🐞 Bug Fixes
- **bootstrap:** update logger extension reference ([7d4915d](https://github.com/guanguans/music-dl/commit/7d4915d))

### 🏎 Performance Improvements
- **app:** optimize download performance ([9630046](https://github.com/guanguans/music-dl/commit/9630046))

### Pull Requests
- Merge pull request [#815](https://github.com/guanguans/music-dl/issues/815) from guanguans/dependabot/composer/larastan/larastan-2.9.9


<a name="5.3.0"></a>
## [5.3.0] - 2024-10-14
### ✨ Features
- **localization:** Improve searching hint with dynamic keyword ([f6da589](https://github.com/guanguans/music-dl/commit/f6da589))
- **music:** read keyword from stdin for pipeline usage ([934f550](https://github.com/guanguans/music-dl/commit/934f550))

### 🐞 Bug Fixes
- **Music:** correct progress display on completion ([16f9c3e](https://github.com/guanguans/music-dl/commit/16f9c3e))
- **MusicCommand:** trim stdin input to remove trailing spaces ([b6933c2](https://github.com/guanguans/music-dl/commit/b6933c2))

### 💅 Code Refactorings
- **app:** improve logger extension and exception handling ([fc33ae7](https://github.com/guanguans/music-dl/commit/fc33ae7))

### 🏎 Performance Improvements
- **Music:** optimize progress update handling ([6dbe893](https://github.com/guanguans/music-dl/commit/6dbe893))


<a name="5.2.9"></a>
## [5.2.9] - 2024-10-10
### 🎨 Styles
- **utils:** Rename ARTIST_LIMIT to ARTIST_TAKE ([0b9f613](https://github.com/guanguans/music-dl/commit/0b9f613))

### 💅 Code Refactorings
- **commands:** add Rescuer trait to MusicCommand ([7ca0eaf](https://github.com/guanguans/music-dl/commit/7ca0eaf))


<a name="5.2.8"></a>
## [5.2.8] - 2024-10-10
### 🐞 Bug Fixes
- **Utils:** improve song name formatting and handle multi-artist scenarios ([cac25dd](https://github.com/guanguans/music-dl/commit/cac25dd))

### 💅 Code Refactorings
- **Sanitizer:** improve artist names display ([2c605da](https://github.com/guanguans/music-dl/commit/2c605da))
- **utils:** extract artist limit to constant ([8837f04](https://github.com/guanguans/music-dl/commit/8837f04))

### 🏎 Performance Improvements
- **Utils:** Simplify filename sanitization logic ([67bb221](https://github.com/guanguans/music-dl/commit/67bb221))


<a name="5.2.7"></a>
## [5.2.7] - 2024-10-10
### 🐞 Bug Fixes
- **Utils:** update directory separator handling ([ff80dd4](https://github.com/guanguans/music-dl/commit/ff80dd4))


<a name="5.2.6"></a>
## [5.2.6] - 2024-10-10
### 🐞 Bug Fixes
- 文件名不能包含下列任何字符 \ / : * ? " < > | ([17e6ac2](https://github.com/guanguans/music-dl/commit/17e6ac2))
- **utils:** Improve song name formatting ([b82a9e2](https://github.com/guanguans/music-dl/commit/b82a9e2))

### 💅 Code Refactorings
- **music-command:** Replace exception handler method ([b1937cc](https://github.com/guanguans/music-dl/commit/b1937cc))

### Pull Requests
- Merge pull request [#812](https://github.com/guanguans/music-dl/issues/812) from midfar/master
- Merge pull request [#809](https://github.com/guanguans/music-dl/issues/809) from guanguans/dependabot/composer/laravel-zero/framework-11.0.2
- Merge pull request [#806](https://github.com/guanguans/music-dl/issues/806) from guanguans/dependabot/composer/rector/swiss-knife-1.0.0
- Merge pull request [#807](https://github.com/guanguans/music-dl/issues/807) from guanguans/dependabot/composer/rector/rector-1.2.6
- Merge pull request [#805](https://github.com/guanguans/music-dl/issues/805) from guanguans/dependabot/composer/ergebnis/composer-normalize-2.44.0


<a name="5.2.5"></a>
## [5.2.5] - 2024-09-30
### ✨ Features
- 更新了league/flysystem、league/flysystem-local和nikic/php-parser依赖版本 ([8802b68](https://github.com/guanguans/music-dl/commit/8802b68))

### 💅 Code Refactorings
- **HttpClientFactory:** change setHttpClient to instance method ([0cafd96](https://github.com/guanguans/music-dl/commit/0cafd96))

### ✅ Tests
- **Music:** Mock HTTP client for music downloads ([2129994](https://github.com/guanguans/music-dl/commit/2129994))


<a name="5.2.4"></a>
## [5.2.4] - 2024-09-29
### ✨ Features
- **HttpClientFactory:** add setHttpClient method ([7d0b775](https://github.com/guanguans/music-dl/commit/7d0b775))
- **music:** refactor Music class and remove InvalidArgumentException ([222cce0](https://github.com/guanguans/music-dl/commit/222cce0))

### 📖 Documents
- **music:** add setMinCallMicroseconds method to facade ([ca5e150](https://github.com/guanguans/music-dl/commit/ca5e150))

### 🏎 Performance Improvements
- **Music:** Refactor constructor for improved initialization ([87dc626](https://github.com/guanguans/music-dl/commit/87dc626))

### ✅ Tests
- **commands:** update assertion methods to assertOk ([61a305f](https://github.com/guanguans/music-dl/commit/61a305f))
- **tests:** rename ArchTest and update Pest usage paths ([3859945](https://github.com/guanguans/music-dl/commit/3859945))

### Pull Requests
- Merge pull request [#804](https://github.com/guanguans/music-dl/issues/804) from guanguans/dependabot/composer/ergebnis/license-2.5.0
- Merge pull request [#803](https://github.com/guanguans/music-dl/issues/803) from guanguans/dependabot/composer/ergebnis/php-cs-fixer-config-6.37.0


<a name="5.2.3"></a>
## [5.2.3] - 2024-09-27
### ✨ Features
- 修改MusicCommand.php以支持动态关键词默认值 ([e1d513b](https://github.com/guanguans/music-dl/commit/e1d513b))
- **Music.php:** 移除了Music类中的meting格式化方法 ([3e78737](https://github.com/guanguans/music-dl/commit/3e78737))

### 💅 Code Refactorings
- **music:** make minimum call time configurable ([a73f4bc](https://github.com/guanguans/music-dl/commit/a73f4bc))


<a name="5.2.2"></a>
## [5.2.2] - 2024-09-27
### ✨ Features
- **music:** add timebox functionality to search method ([4a3f341](https://github.com/guanguans/music-dl/commit/4a3f341))

### 💅 Code Refactorings
- **commands:** remove unnecessary docblocks ([ddc6586](https://github.com/guanguans/music-dl/commit/ddc6586))
- **music:** improve dependency injection and initialization ([6ae0cf9](https://github.com/guanguans/music-dl/commit/6ae0cf9))
- **music:** Implement Isolatable interface and improve visibility ([f1634f9](https://github.com/guanguans/music-dl/commit/f1634f9))

### ✅ Tests
- **music:** ensure fork concurrency is set by default ([5dc625b](https://github.com/guanguans/music-dl/commit/5dc625b))


<a name="5.2.1"></a>
## [5.2.1] - 2024-09-23
### 🐞 Bug Fixes
- **app:** remove unused MusicManager references ([9f95de6](https://github.com/guanguans/music-dl/commit/9f95de6))

### 📖 Documents
- **readme:** update search driver options in documentation ([d63bae8](https://github.com/guanguans/music-dl/commit/d63bae8))

### ✅ Tests
- **music:** add setDriver method and update tests ([554e492](https://github.com/guanguans/music-dl/commit/554e492))


<a name="5.2.0"></a>
## [5.2.0] - 2024-09-23
### ✨ Features
- **concurrency:** add concurrency service provider and config ([5e9463d](https://github.com/guanguans/music-dl/commit/5e9463d))
- **music:** Refactor music command and rename SequenceMusic ([4112333](https://github.com/guanguans/music-dl/commit/4112333))
- **music:** Refactor MusicCommand to use SequenceMusic with Concurrency ([5e75faa](https://github.com/guanguans/music-dl/commit/5e75faa))

### 🐞 Bug Fixes
- **command:** update music command driver option ([c39dd05](https://github.com/guanguans/music-dl/commit/c39dd05))

### 💅 Code Refactorings
- **music:** replace MusicManager with MusicContract ([5723d61](https://github.com/guanguans/music-dl/commit/5723d61))

### ✅ Tests
- **tests:** Improve pest configuration and debugging checks ([ee7b009](https://github.com/guanguans/music-dl/commit/ee7b009))

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
### ✨ Features
- **exceptions:** remove Handler.php file ([f140579](https://github.com/guanguans/music-dl/commit/f140579))

### 📦 Builds
- **dependencies:** update guzzlehttp/guzzle and other packages ([153061b](https://github.com/guanguans/music-dl/commit/153061b))

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
### ✨ Features
- **SequenceMusic:** Add sorting by multiple fields ([d0233b6](https://github.com/guanguans/music-dl/commit/d0233b6))
- **composer:** add rector/swiss-knife to composer.json ([37ad419](https://github.com/guanguans/music-dl/commit/37ad419))

### 🎨 Styles
- **Music:** Fix variable naming in download method ([0f3677b](https://github.com/guanguans/music-dl/commit/0f3677b))
- **app:** refactor method names for clarity ([fceddcd](https://github.com/guanguans/music-dl/commit/fceddcd))

### 💅 Code Refactorings
- **utils:** Change method names for default save directory and saved path ([4a641fb](https://github.com/guanguans/music-dl/commit/4a641fb))

### ✅ Tests
- **test:** Update pest command to include colors ([a8b0641](https://github.com/guanguans/music-dl/commit/a8b0641))


<a name="5.1.2"></a>
## [5.1.2] - 2024-07-12
### 💅 Code Refactorings
- **Sanitizer:** update file size formatting ([bebe5f4](https://github.com/guanguans/music-dl/commit/bebe5f4))


<a name="5.1.1"></a>
## [5.1.1] - 2024-07-12
### 🐞 Bug Fixes
- **app.php:** Improve registration of TinkerZeroServiceProvider ([3fa2b15](https://github.com/guanguans/music-dl/commit/3fa2b15))


<a name="5.1.0"></a>
## [5.1.0] - 2024-07-12
### ✨ Features
- **bootstrap:** Register TinkerZeroServiceProvider in production ([3e10bda](https://github.com/guanguans/music-dl/commit/3e10bda))
- **deps:** add tinker-zero dependency ([a1bad2b](https://github.com/guanguans/music-dl/commit/a1bad2b))

### Pull Requests
- Merge pull request [#769](https://github.com/guanguans/music-dl/issues/769) from guanguans/dependabot/composer/pestphp/pest-2.34.9


<a name="5.0.2"></a>
## [5.0.2] - 2024-07-08
### 🐞 Bug Fixes
- **MusicCommand:** Fix return type in when closure ([126ece0](https://github.com/guanguans/music-dl/commit/126ece0))

### 📦 Builds
- **composer:** update composer dependencies ([5dfe33a](https://github.com/guanguans/music-dl/commit/5dfe33a))

### 🤖 Continuous Integrations
- **automation:** Update method signature in Music.php facade ([bcb8eb0](https://github.com/guanguans/music-dl/commit/bcb8eb0))

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
### ✨ Features
- **bootstrap:** Add Application configuration and create method ([70760e5](https://github.com/guanguans/music-dl/commit/70760e5))

### 💅 Code Refactorings
- **app:** Update MusicManager singleton registration ([d0885be](https://github.com/guanguans/music-dl/commit/d0885be))
- **app:** update service provider configuration ([0bf37f5](https://github.com/guanguans/music-dl/commit/0bf37f5))
- **handler:** remove unnecessary code in Handler.php ([996e3a8](https://github.com/guanguans/music-dl/commit/996e3a8))


<a name="5.0.0"></a>
## [5.0.0] - 2024-05-24
### ✨ Features
- **.php-cs-fixer.php:** add MIT license header and update rules ([bc02765](https://github.com/guanguans/music-dl/commit/bc02765))
- **app:** add LogManager extension in AppServiceProvider ([5499480](https://github.com/guanguans/music-dl/commit/5499480))

### 📖 Documents
- **README:** Update PHP version requirement to 8.2 ([8232c4c](https://github.com/guanguans/music-dl/commit/8232c4c))

### 🎨 Styles
- apply rector ([c3cf623](https://github.com/guanguans/music-dl/commit/c3cf623))
- apply php-cs-fixer ([7113def](https://github.com/guanguans/music-dl/commit/7113def))

### 💅 Code Refactorings
- **command:** Update return types in handle method ([b327548](https://github.com/guanguans/music-dl/commit/b327548))


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
### ✨ Features
- Add language pack support ([6df187b](https://github.com/guanguans/music-dl/commit/6df187b))
- **ServiceProvider:** Add conditional registration of language-related services ([dac0677](https://github.com/guanguans/music-dl/commit/dac0677))
- **lang:** add language option to specify the language ([7c0f7e6](https://github.com/guanguans/music-dl/commit/7c0f7e6))

### 🐞 Bug Fixes
- **config:** Update music-dl config key to app ([9bd6a19](https://github.com/guanguans/music-dl/commit/9bd6a19))

### 💅 Code Refactorings
- Removed unnecessary language files and service providers from the Laravel application. ([25d476f](https://github.com/guanguans/music-dl/commit/25d476f))
- **ServiceProvider:** Remove unnecessary code from AppServiceProvider ([43cc2fe](https://github.com/guanguans/music-dl/commit/43cc2fe))
- **config:** Update logo and sources in app configuration ([30f6e96](https://github.com/guanguans/music-dl/commit/30f6e96))
- **hydrator:** improve song hydration process ([ed20ec7](https://github.com/guanguans/music-dl/commit/ed20ec7))
- **i18n:** update language keys for music command ([f7179a5](https://github.com/guanguans/music-dl/commit/f7179a5))
- **music-dl:** update language keys for MusicCommand ([da2097c](https://github.com/guanguans/music-dl/commit/da2097c))

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
### ✨ Features
- **box.json:** Add support for disabling requirements check ([b9d4d82](https://github.com/guanguans/music-dl/commit/b9d4d82))


<a name="4.2.0"></a>
## [4.2.0] - 2024-04-07
### ✨ Features
- **composer-updater:** add dry-run option ([9291dd1](https://github.com/guanguans/music-dl/commit/9291dd1))

### 💅 Code Refactorings
- **utils:** improve savePathFor method ([006ad09](https://github.com/guanguans/music-dl/commit/006ad09))
- **utils:** update method names for saving files ([40a3b64](https://github.com/guanguans/music-dl/commit/40a3b64))

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
### 💅 Code Refactorings
- **composer-updater:** refactor SingleCommandApplication class ([d6a4396](https://github.com/guanguans/music-dl/commit/d6a4396))

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
### 🐞 Bug Fixes
- **MusicManager:** Update type hint for createDriver parameter ([9f0c884](https://github.com/guanguans/music-dl/commit/9f0c884))

### 📖 Documents
- update README files ([6eb2b99](https://github.com/guanguans/music-dl/commit/6eb2b99))
- **readme:** Update README.md and README-zh_CN.md ([5f931e4](https://github.com/guanguans/music-dl/commit/5f931e4))

### Pull Requests
- Merge pull request [#611](https://github.com/guanguans/music-dl/issues/611) from guanguans/imgbot
- Merge pull request [#610](https://github.com/guanguans/music-dl/issues/610) from guanguans/dependabot/composer/rector/rector-0.18.11


<a name="4.1.6"></a>
## [4.1.6] - 2023-11-27
### ✨ Features
- **github:** Add CODE_OF_CONDUCT.md ([e3a3099](https://github.com/guanguans/music-dl/commit/e3a3099))

### 🐞 Bug Fixes
- **coding-style:** fix arrow function usage ([c256e28](https://github.com/guanguans/music-dl/commit/c256e28))

### 📖 Documents
- **readme:** Update README file ([440f233](https://github.com/guanguans/music-dl/commit/440f233))

### 💅 Code Refactorings
- **tests:** refactor test cases ([a753615](https://github.com/guanguans/music-dl/commit/a753615))
- **utils:** Remove codeCoverageIgnore comments ([26e34d4](https://github.com/guanguans/music-dl/commit/26e34d4))


<a name="4.1.5"></a>
## [4.1.5] - 2023-11-27
### 💅 Code Refactorings
- **commands:** refactor MusicCommand handle method ([ee779a1](https://github.com/guanguans/music-dl/commit/ee779a1))

### Pull Requests
- Merge pull request [#609](https://github.com/guanguans/music-dl/issues/609) from guanguans/imgbot


<a name="4.1.4"></a>
## [4.1.4] - 2023-11-26
### 💅 Code Refactorings
- **Hydrator:** Add Hydrator trait for MusicCommand ([aadabf2](https://github.com/guanguans/music-dl/commit/aadabf2))
- **MusicCommand:** refactor code for selecting keys ([5914121](https://github.com/guanguans/music-dl/commit/5914121))
- **MusicCommand:** simplify song mapping ([5dcb623](https://github.com/guanguans/music-dl/commit/5dcb623))
- **Sanitizer:** Update mapWithKeys to map ([b7deb92](https://github.com/guanguans/music-dl/commit/b7deb92))
- **handler:** add code coverage ignore annotation to register method ([8d46312](https://github.com/guanguans/music-dl/commit/8d46312))
- **tests:** refactor ForkMusicTest ([09dcc40](https://github.com/guanguans/music-dl/commit/09dcc40))
- **tests:** refactor `Pest.php` test file ([87833ef](https://github.com/guanguans/music-dl/commit/87833ef))

### ✅ Tests
- **Feature:** fix music download error ([a500117](https://github.com/guanguans/music-dl/commit/a500117))


<a name="4.1.3"></a>
## [4.1.3] - 2023-11-26
### 🐞 Bug Fixes
- **Exceptions:** Remove unused annotations in Handler.php ([c648e01](https://github.com/guanguans/music-dl/commit/c648e01))
- **tests:** Fix GuzzleHttp exception class name ([4a0750e](https://github.com/guanguans/music-dl/commit/4a0750e))
- **tests:** Fix download path in MusicCommandTest ([242918d](https://github.com/guanguans/music-dl/commit/242918d))

### 💅 Code Refactorings
- **MusicManager:** remove final keyword ([e7c4099](https://github.com/guanguans/music-dl/commit/e7c4099))
- **SequenceMusic:** improve progress bar ([f9cb4b8](https://github.com/guanguans/music-dl/commit/f9cb4b8))

### ✅ Tests
- **CommitMessages:** Add commit messages for git diff output ([f5b94b4](https://github.com/guanguans/music-dl/commit/f5b94b4))
- **Unit:** Add SanitizerTest ([8bb6143](https://github.com/guanguans/music-dl/commit/8bb6143))


<a name="4.1.2"></a>
## [4.1.2] - 2023-11-25
### 🐞 Bug Fixes
- **MusicCommand:** Fix type hint in mapWithKeys callback ([d7a6421](https://github.com/guanguans/music-dl/commit/d7a6421))
- **commands:** Add #[\Override] attribute to schedule method ([955bfd1](https://github.com/guanguans/music-dl/commit/955bfd1))

### 💅 Code Refactorings
- **HttpClientFactory:** Update nullability of httpClient ([c280c14](https://github.com/guanguans/music-dl/commit/c280c14))
- **Music:** change return type of search method in SequenceMusic class ([4248e01](https://github.com/guanguans/music-dl/commit/4248e01))
- **Sanitizer:** update method signature ([d50de00](https://github.com/guanguans/music-dl/commit/d50de00))
- **app:** refactor exception handler, music facade, fork music, and music manager ([1ddf6ef](https://github.com/guanguans/music-dl/commit/1ddf6ef))
- **command:** simplify MusicCommand.php ([250a8de](https://github.com/guanguans/music-dl/commit/250a8de))
- **command:** Update MusicCommand.php ([6b4e0be](https://github.com/guanguans/music-dl/commit/6b4e0be))
- **commands:** refactor MusicCommand.php ([ca25043](https://github.com/guanguans/music-dl/commit/ca25043))
- **commands:** Refactor MusicCommand class ([5ff1643](https://github.com/guanguans/music-dl/commit/5ff1643))


<a name="4.1.1"></a>
## [4.1.1] - 2023-11-24
### 🐞 Bug Fixes
- **SequenceMusic:** Fix progress callback in createHttpClient ([552e255](https://github.com/guanguans/music-dl/commit/552e255))
- **SequenceMusic:** Update progress handling in download ([22feb31](https://github.com/guanguans/music-dl/commit/22feb31))

### 💅 Code Refactorings
- **SequenceMusic:** Remove unused imports and update progress handling ([a90bde5](https://github.com/guanguans/music-dl/commit/a90bde5))
- **commands:** remove unnecessary notification ([b8410dd](https://github.com/guanguans/music-dl/commit/b8410dd))
- **commands:** refactor MusicCommand ([8933dbf](https://github.com/guanguans/music-dl/commit/8933dbf))
- **music:** refactor MusicCommand.php ([fb32a95](https://github.com/guanguans/music-dl/commit/fb32a95))


<a name="4.1.0"></a>
## [4.1.0] - 2023-11-24
### 🐞 Bug Fixes
- **app:** Filter songs without URL in SequenceMusic ([6f686ba](https://github.com/guanguans/music-dl/commit/6f686ba))
- **commands:** Fix MusicCommand pipe function ([f2b9354](https://github.com/guanguans/music-dl/commit/f2b9354))

### 💅 Code Refactorings
- **MusicCommand:** refactor MusicCommand class ([6a9a292](https://github.com/guanguans/music-dl/commit/6a9a292))
- **app:** remove unused imports(spinner) ([d7a0236](https://github.com/guanguans/music-dl/commit/d7a0236))
- **command:** refactor MusicCommand.php ([fa4453b](https://github.com/guanguans/music-dl/commit/fa4453b))
- **command:** Refactor MusicCommand.php ([0e552c5](https://github.com/guanguans/music-dl/commit/0e552c5))
- **command:** refactor MusicCommand.php ([83ecde3](https://github.com/guanguans/music-dl/commit/83ecde3))
- **commands:** Remove async driver option ([9a8e56d](https://github.com/guanguans/music-dl/commit/9a8e56d))
- **commands:** Remove unused import in MusicCommand ([af9bb21](https://github.com/guanguans/music-dl/commit/af9bb21))

### Pull Requests
- Merge pull request [#608](https://github.com/guanguans/music-dl/issues/608) from guanguans/dependabot/composer/spatie/fork-1.2.1


<a name="4.0.1"></a>
## [4.0.1] - 2023-11-23
### ✨ Features
- **Facades:** Add Music facade ([2d37b70](https://github.com/guanguans/music-dl/commit/2d37b70))


<a name="4.0.0"></a>
## [4.0.0] - 2023-11-23
### ✨ Features
- **composer:** Add laravel/facade-documenter ([937393b](https://github.com/guanguans/music-dl/commit/937393b))

### 📖 Documents
- **readme:** update PHP version requirement ([59e3233](https://github.com/guanguans/music-dl/commit/59e3233))

### Pull Requests
- Merge pull request [#607](https://github.com/guanguans/music-dl/issues/607) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.39.0
- Merge pull request [#606](https://github.com/guanguans/music-dl/issues/606) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.17.0


<a name="3.6.4"></a>
## [3.6.4] - 2023-11-17
### 💅 Code Refactorings
- **monorepo-builder:** update release workers ([9cb8f2c](https://github.com/guanguans/music-dl/commit/9cb8f2c))
- **php-cs-fixer:** Change curly_braces_position to braces_position ([37e7502](https://github.com/guanguans/music-dl/commit/37e7502))

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
### 💅 Code Refactorings
- **Utils:** update method names to camelCase ([634c49c](https://github.com/guanguans/music-dl/commit/634c49c))
- **rector.php:** update rules configuration ([61cd897](https://github.com/guanguans/music-dl/commit/61cd897))
- **utils:** update default save directory logic ([1c00aee](https://github.com/guanguans/music-dl/commit/1c00aee))

### Pull Requests
- Merge pull request [#552](https://github.com/guanguans/music-dl/issues/552) from guanguans/dependabot/composer/guanguans/ai-commit-1.7.6
- Merge pull request [#551](https://github.com/guanguans/music-dl/issues/551) from guanguans/dependabot/composer/guanguans/ai-commit-1.7.3
- Merge pull request [#550](https://github.com/guanguans/music-dl/issues/550) from guanguans/dependabot/composer/guanguans/monorepo-builder-worker-1.1.11
- Merge pull request [#549](https://github.com/guanguans/music-dl/issues/549) from guanguans/dependabot/composer/rector/rector-0.17.7


<a name="3.6.1"></a>
## [3.6.1] - 2023-07-23
### 🐞 Bug Fixes
- **commands:** Fix recallSelf method calls ([7a22b69](https://github.com/guanguans/music-dl/commit/7a22b69))


<a name="3.6.0"></a>
## [3.6.0] - 2023-07-23
### ✨ Features
- **monorepo-builder.php:** Add new file for monorepo configuration ([14c9396](https://github.com/guanguans/music-dl/commit/14c9396))

### 🐞 Bug Fixes
- **config:** Add php_unit_data_provider_return_type ([6101ab1](https://github.com/guanguans/music-dl/commit/6101ab1))
- **workflows:** fix upload command in publish-phar.yml ([68a3e25](https://github.com/guanguans/music-dl/commit/68a3e25))

### Pull Requests
- Merge pull request [#548](https://github.com/guanguans/music-dl/issues/548) from guanguans/dependabot/composer/mockery/mockery-1.6.4
- Merge pull request [#547](https://github.com/guanguans/music-dl/issues/547) from guanguans/dependabot/composer/kubawerlos/php-cs-fixer-custom-fixers-3.16.0
- Merge pull request [#546](https://github.com/guanguans/music-dl/issues/546) from guanguans/dependabot/composer/mockery/mockery-1.6.3
- Merge pull request [#545](https://github.com/guanguans/music-dl/issues/545) from guanguans/dependabot/composer/friendsofphp/php-cs-fixer-3.22.0
- Merge pull request [#544](https://github.com/guanguans/music-dl/issues/544) from guanguans/dependabot/composer/rector/rector-0.17.6
- Merge pull request [#543](https://github.com/guanguans/music-dl/issues/543) from guanguans/dependabot/composer/guanguans/ai-commit-1.6.9


<a name="v3.5.7"></a>
## [v3.5.7] - 2023-07-14
### 🐞 Bug Fixes
- **config:** update windows_tip message ([f2beebc](https://github.com/guanguans/music-dl/commit/f2beebc))


<a name="v3.5.6"></a>
## [v3.5.6] - 2023-07-14
### Pull Requests
- Merge pull request [#542](https://github.com/guanguans/music-dl/issues/542) from guanguans/imgbot


<a name="v3.5.5"></a>
## [v3.5.5] - 2023-07-13
### ✨ Features
- **MusicCommand:** add --no-continue option ([6828d66](https://github.com/guanguans/music-dl/commit/6828d66))

### 🐞 Bug Fixes
- **commit:** adjust dimensions and typing speed ([9482ebe](https://github.com/guanguans/music-dl/commit/9482ebe))
- **composer:** add ai-commit-no-verify command ([03d7922](https://github.com/guanguans/music-dl/commit/03d7922))
- **tape:** adjust typing delay ([6ba7873](https://github.com/guanguans/music-dl/commit/6ba7873))

### 💅 Code Refactorings
- **Command:** optimize logo and windows tip output ([bef72d2](https://github.com/guanguans/music-dl/commit/bef72d2))
- **command:** Remove unused property ([26e62ab](https://github.com/guanguans/music-dl/commit/26e62ab))

### Pull Requests
- Merge pull request [#541](https://github.com/guanguans/music-dl/issues/541) from guanguans/dependabot/composer/rector/rector-0.17.5
- Merge pull request [#540](https://github.com/guanguans/music-dl/issues/540) from guanguans/dependabot/composer/pestphp/pest-1.23.1


<a name="v3.5.4"></a>
## [v3.5.4] - 2023-07-12
### 📖 Documents
- **readme:** add disclaimer for commercial use ([fd73eac](https://github.com/guanguans/music-dl/commit/fd73eac))

### 💅 Code Refactorings
- **console-spinner:** update spinner characters ([299f20c](https://github.com/guanguans/music-dl/commit/299f20c))


<a name="v3.5.3"></a>
## [v3.5.3] - 2023-07-12
### ✨ Features
- **commands:** Add VendorPublishCommand ([3c89783](https://github.com/guanguans/music-dl/commit/3c89783))
- **tests:** Add test to verify downloaded music exists ([d7e40a6](https://github.com/guanguans/music-dl/commit/d7e40a6))

### 🐞 Bug Fixes
- **tests:** Skip dependency on music search and download ([bef9bdc](https://github.com/guanguans/music-dl/commit/bef9bdc))

### 📖 Documents
- **README:** update installation instructions ([8cce689](https://github.com/guanguans/music-dl/commit/8cce689))
- **readme:** Update Chinese README ([5e648fd](https://github.com/guanguans/music-dl/commit/5e648fd))

### 💅 Code Refactorings
- **VendorPublishCommand:** make VendorPublishCommand class final ([0ff7760](https://github.com/guanguans/music-dl/commit/0ff7760))
- **tests:** Update test cases and add new test file ([851b75d](https://github.com/guanguans/music-dl/commit/851b75d))

### ✅ Tests
- **Feature:** Add MusicCommandTest ([e6dd388](https://github.com/guanguans/music-dl/commit/e6dd388))

### Pull Requests
- Merge pull request [#539](https://github.com/guanguans/music-dl/issues/539) from guanguans/imgbot


<a name="v3.5.2"></a>
## [v3.5.2] - 2023-07-12
### ✨ Features
- **Exceptions:** Add InvalidArgumentException class ([fa153d9](https://github.com/guanguans/music-dl/commit/fa153d9))
- **Music:** Add spinner creation function in SequenceMusic ([5b762e0](https://github.com/guanguans/music-dl/commit/5b762e0))
- **music:** add ForkMusic class ([8a0940f](https://github.com/guanguans/music-dl/commit/8a0940f))

### 💅 Code Refactorings
- **AsyncMusic:** ensure songs have URL ([bfec254](https://github.com/guanguans/music-dl/commit/bfec254))
- **AsyncMusic:** Return all songs instead of cleaning ([190950b](https://github.com/guanguans/music-dl/commit/190950b))
- **AsyncMusic:** refactor the requestUrl method ([9a2af60](https://github.com/guanguans/music-dl/commit/9a2af60))
- **Music:** rename methods and variables for clarity ([99dca59](https://github.com/guanguans/music-dl/commit/99dca59))
- **SequenceMusic:** remove unused variable and simplify progress logic ([de607da](https://github.com/guanguans/music-dl/commit/de607da))

### Pull Requests
- Merge pull request [#538](https://github.com/guanguans/music-dl/issues/538) from guanguans/dependabot/composer/rector/rector-0.17.4


<a name="v3.5.1"></a>
## [v3.5.1] - 2023-07-11
### 🐞 Bug Fixes
- **MusicCommand:** modify collection handling ([55664d7](https://github.com/guanguans/music-dl/commit/55664d7))


<a name="v3.5.0"></a>
## [v3.5.0] - 2023-07-11
### 🐞 Bug Fixes
- **Command:** Fix issue with keyword argument in MusicCommand ([4c1363f](https://github.com/guanguans/music-dl/commit/4c1363f))
- **MusicManager:** Fix createDriver method throwing BindingResolutionException ([5279c36](https://github.com/guanguans/music-dl/commit/5279c36))

### 💅 Code Refactorings
- **Music:** modify SequenceMusic class ([e15d156](https://github.com/guanguans/music-dl/commit/e15d156))
- **MusicCommand:** update string literals ([7814a61](https://github.com/guanguans/music-dl/commit/7814a61))
- **SequenceMusic:** Refactor ensureWithUrl and add clean method ([9d6d95c](https://github.com/guanguans/music-dl/commit/9d6d95c))
- **command:** Improve ThanksCommand ([fc969f4](https://github.com/guanguans/music-dl/commit/fc969f4))
- **config:** Update paths in .php-cs-fixer.php and rector.php ([8739c37](https://github.com/guanguans/music-dl/commit/8739c37))
- **musicmanager:** improve default driver retrieval ([1a7e41b](https://github.com/guanguans/music-dl/commit/1a7e41b))
- **sanitizer:** update return type in sanitizes method ([7f21464](https://github.com/guanguans/music-dl/commit/7f21464))

### Pull Requests
- Merge pull request [#537](https://github.com/guanguans/music-dl/issues/537) from guanguans/dependabot/composer/rector/rector-0.17.3


<a name="v3.4.1"></a>
## [v3.4.1] - 2023-07-10
### ✨ Features
- **AsyncMusic:** Improve song loading efficiency ([63ebccb](https://github.com/guanguans/music-dl/commit/63ebccb))
- **Music:** Add spinner functionality to Music class ([2138bb1](https://github.com/guanguans/music-dl/commit/2138bb1))
- **app:** add LaravelConsoleSpinnerServiceProvider ([e9f9a1a](https://github.com/guanguans/music-dl/commit/e9f9a1a))

### 🐞 Bug Fixes
- **commands:** update Windows tips ([7d598ac](https://github.com/guanguans/music-dl/commit/7d598ac))

### 💅 Code Refactorings
- **Music:** Rename Music class to SequenceMusic ([2f79726](https://github.com/guanguans/music-dl/commit/2f79726))
- **SequenceMusic:** optimize carryUrl method ([b1ff863](https://github.com/guanguans/music-dl/commit/b1ff863))
- **commands:** change search driver option ([bee4479](https://github.com/guanguans/music-dl/commit/bee4479))


<a name="v3.4.0"></a>
## [v3.4.0] - 2023-07-10
### ✨ Features
- **support:** add Utils class ([c981396](https://github.com/guanguans/music-dl/commit/c981396))

### 💅 Code Refactorings
- **MusicCommand:** change 'channels' to 'sources' ([f9ba18f](https://github.com/guanguans/music-dl/commit/f9ba18f))
- **app:** move helpers.php to app/Support ([3b7e358](https://github.com/guanguans/music-dl/commit/3b7e358))
- **music:** Remove redundant code in AsyncMusic ([e2ff7f4](https://github.com/guanguans/music-dl/commit/e2ff7f4))
- **music:** rename Music namespace ([79ccf9c](https://github.com/guanguans/music-dl/commit/79ccf9c))


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
### 🐞 Bug Fixes
- Remove xiami platform support ([00a969f](https://github.com/guanguans/music-dl/commit/00a969f))


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
### 📖 Documents
- add luokuncool as a contributor ([#16](https://github.com/guanguans/music-dl/issues/16)) ([934d85e](https://github.com/guanguans/music-dl/commit/934d85e))
- create .all-contributorsrc ([ea93ace](https://github.com/guanguans/music-dl/commit/ea93ace))
- update README.md ([5c28636](https://github.com/guanguans/music-dl/commit/5c28636))


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

[Unreleased]: https://github.com/guanguans/music-dl/compare/6.2.3...HEAD
[6.2.3]: https://github.com/guanguans/music-dl/compare/6.2.2...6.2.3
[6.2.2]: https://github.com/guanguans/music-dl/compare/6.2.1...6.2.2
[6.2.1]: https://github.com/guanguans/music-dl/compare/6.2.0...6.2.1
[6.2.0]: https://github.com/guanguans/music-dl/compare/6.1.0...6.2.0
[6.1.0]: https://github.com/guanguans/music-dl/compare/6.0.4...6.1.0
[6.0.4]: https://github.com/guanguans/music-dl/compare/6.0.3...6.0.4
[6.0.3]: https://github.com/guanguans/music-dl/compare/6.0.2...6.0.3
[6.0.2]: https://github.com/guanguans/music-dl/compare/6.0.1...6.0.2
[6.0.1]: https://github.com/guanguans/music-dl/compare/6.0.0...6.0.1
[6.0.0]: https://github.com/guanguans/music-dl/compare/5.3.6...6.0.0
[5.3.6]: https://github.com/guanguans/music-dl/compare/5.3.5...5.3.6
[5.3.5]: https://github.com/guanguans/music-dl/compare/5.3.4...5.3.5
[5.3.4]: https://github.com/guanguans/music-dl/compare/5.3.3...5.3.4
[5.3.3]: https://github.com/guanguans/music-dl/compare/5.3.2...5.3.3
[5.3.2]: https://github.com/guanguans/music-dl/compare/5.3.1...5.3.2
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
