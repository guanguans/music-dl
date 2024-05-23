<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => 'Music DL',

    // The logo of the application.
    'logo' => sprintf(<<<'logo'
        <fg=green;options=bold>
             __  __           _        _____  _
            |  \/  |         (_)      |  __ \| |
            | \  / |_   _ ___ _  ___  | |  | | |
            | |\/| | | | / __| |/ __| | |  | | |
            | |  | | |_| \__ \ | (__  | |__| | |____
            |_|  |_|\__,_|___/_|\___| |_____/|______| %s
        </>
        logo, config('app.version')),

    // The search sources.
    'sources' => [
        'tencent',
        'netease',
        'kugou',
        // 'baidu',
        // 'kuwo',
        // 'xiami',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Version
    |--------------------------------------------------------------------------
    |
    | This value determines the "version" your application is currently running
    | in. You may want to follow the "Semantic Versioning" - Given a version
    | number MAJOR.MINOR.PATCH when an update happens: https://semver.org.
    |
    */

    'version' => app('git.version'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. This can be overridden using
    | the global command line "--env" option when calling commands.
    |
    */

    // 'env' => 'development',
    'env' => env('APP_ENV', 'development'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Asia/Shanghai',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'zh_CN',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        // Laravel Framework Service Providers...
        // Illuminate\Cache\CacheServiceProvider::class,
        // Illuminate\Filesystem\FilesystemServiceProvider::class,
        // Illuminate\Hashing\HashServiceProvider::class,
        // Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        // Illuminate\Validation\ValidationServiceProvider::class,
        // Illuminate\View\ViewServiceProvider::class,

        // Application Service Providers...
        App\Providers\AppServiceProvider::class,
    ],
];
