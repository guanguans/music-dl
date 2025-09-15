<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use LaravelLang\Config\Constants\RouteName;
use LaravelLang\LocaleList\Locale;

return [
    /*
     * Determines what type of files to use when updating language files.
     *
     * @see https://laravel-lang.com/configuration.html#inline
     *
     * By default, `false`.
     */

    'inline' => (bool) env('LOCALIZATION_INLINE', env('LANG_PUBLISHER_INLINE')),

    /*
     * Do arrays need to be aligned by keys before processing arrays?
     *
     * @see https://laravel-lang.com/configuration.html#alignment
     *
     * By default, true
     */

    'align' => (bool) env('LOCALIZATION_ALIGN', env('LANG_PUBLISHER_ALIGN', false)),

    /*
     * The language codes chosen for the files in this repository may not
     * match the preferences for your project.
     *
     * Specify here mappings of localizations with your project.
     *
     * @see https://laravel-lang.com/configuration.html#aliases
     */

    'aliases' => [
        // \LaravelLang\LocaleList\Locale::German->value => 'de-DE',
        // \LaravelLang\LocaleList\Locale::GermanSwitzerland->value => 'de-CH',
    ],

    /*
     * This option determines the mechanism for converting translation
     * keys into a typographic version.
     *
     * @see https://laravel-lang.com/configuration.html#smart_punctuation
     *
     * By default, false
     */

    'smart_punctuation' => [
        'enable' => (bool) env('LOCALIZATION_SMART_ENABLED', false),

        'common' => [
            'double_quote_opener' => '“',
            'double_quote_closer' => '”',
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],

        'locales' => [
            Locale::French->value => [
                'double_quote_opener' => '«&nbsp;',
                'double_quote_closer' => '&nbsp;»',
                'single_quote_opener' => '‘',
                'single_quote_closer' => '’',
            ],

            Locale::Russian->value => [
                'double_quote_opener' => '«',
                'double_quote_closer' => '»',
                'single_quote_opener' => '‘',
                'single_quote_closer' => '’',
            ],

            Locale::Ukrainian->value => [
                'double_quote_opener' => '«',
                'double_quote_closer' => '»',
                'single_quote_opener' => '‘',
                'single_quote_closer' => '’',
            ],

            Locale::Belarusian->value => [
                'double_quote_opener' => '«',
                'double_quote_closer' => '»',
                'single_quote_opener' => '‘',
                'single_quote_closer' => '’',
            ],
        ],
    ],

    /*
     * This option defines the application's route settings.
     *
     * @see https://laravel-lang.com/configuration.html#routes
     */

    'routes' => [
        /*
         * This option defines the settings for the key names used when working with application routing.
         *
         * Default values:
         *
         *   parameter - locale
         *   header    - Accept-Language
         *   cookie    - Accept-Language
         *   session   - Accept-Language
         *   column    - column
         */

        'names' => [
            'parameter' => RouteName::Parameter,
            'header' => RouteName::Header,
            'cookie' => RouteName::Cookie,
            'session' => RouteName::Session,
            'column' => RouteName::Column,
        ],

        /*
         * This option specifies the prefix of route group names.
         *
         * By default, `localized.`
         */

        'name_prefix' => env('LOCALIZATION_NAME_PREFIX', 'localized.'),

        /*
         * This option specifies the request redirection option when trying to open the default localization.
         *
         * Applies when using the `LaravelLang\Routes\Facades\LocalizationRoute` facade.
         */

        'redirect_default' => (bool) env('LOCALIZATION_REDIRECT_DEFAULT', false),

        /*
         * This option defines the default localization, when used, the localization parameter will be removed from the URL.
         *
         * Applies when using the `localizedRoute` helper.
         */

        'hide_default' => (bool) env('LOCALIZATION_HIDE_DEFAULT', false),

        // This option contains settings for routes.

        'group' => [
            'middlewares' => [
                // This option contains settings for routes without the prefix of the localization code.

                'default' => [
                    LaravelLang\Routes\Middlewares\LocalizationByCookie::class,
                    LaravelLang\Routes\Middlewares\LocalizationByHeader::class,
                    LaravelLang\Routes\Middlewares\LocalizationBySession::class,
                    LaravelLang\Routes\Middlewares\LocalizationByModel::class,
                ],

                // This option contains settings for routes with the prefix of the localization code.

                'prefix' => [
                    LaravelLang\Routes\Middlewares\LocalizationByParameterPrefix::class,
                    LaravelLang\Routes\Middlewares\LocalizationByCookie::class,
                    LaravelLang\Routes\Middlewares\LocalizationByHeader::class,
                    LaravelLang\Routes\Middlewares\LocalizationBySession::class,
                    LaravelLang\Routes\Middlewares\LocalizationByModel::class,
                ],
            ],
        ],
    ],

    /*
     * This option defines settings for working with model translations.
     *
     * @see https://laravel-lang.com/configuration.html#models
     */

    'models' => [
        /*
         * This option specifies a suffix for models containing translations.
         *
         * For example,
         *   main model is `App\Models\Page`
         *   translation model is `App\Models\PageTranslation`
         *
         * By default, `Translation`
         */

        'suffix' => 'Translation',

        /*
         * This option determines the need to filter localizations loaded
         * in the relay when using eager loading.
         *
         * By default, true.
         */

        'filter' => [
            'enabled' => (bool) env('LOCALIZATION_FILTER_ENABLED', true),
        ],

        /*
         * This option specifies a folder to store helper files for the IDE.
         *
         * By default, `vendor/_laravel_lang`
         */

        'helpers' => env('VENDOR_PATH', base_path('vendor/_laravel_lang')),
    ],

    /*
     * This option contains a list of translators that the Laravel Lang Translator project works with.
     *
     * Google Translate is enabled by default.
     *
     * @see https://laravel-lang.com/configuration.html#translators
     */

    'translators' => [
        /*
         * List of channels used for translations.
         *
         * By default,
         *
         *     Google is enabled
         *     Deepl  is disabled
         *     Yandex is disabled
         */

        'channels' => [
            'google' => [
                'translator' => '\LaravelLang\Translator\Integrations\Google',

                'enabled' => (bool) env('TRANSLATION_GOOGLE_ENABLED', true),
                'priority' => (int) env('TRANSLATION_GOOGLE_PRIORITY', 1),
            ],

            'deepl' => [
                'translator' => '\LaravelLang\Translator\Integrations\Deepl',

                'enabled' => (bool) env('TRANSLATION_DEEPL_ENABLED', false),
                'priority' => (int) env('TRANSLATION_DEEPL_PRIORITY', 2),

                'credentials' => [
                    'key' => (string) env('TRANSLATION_DEEPL_KEY'),
                ],
            ],

            'yandex' => [
                'translator' => '\LaravelLang\Translator\Integrations\Yandex',

                'enabled' => (bool) env('TRANSLATION_YANDEX_ENABLED', false),
                'priority' => (int) env('TRANSLATION_YANDEX_PRIORITY', 3),

                'credentials' => [
                    'key' => (string) env('TRANSLATION_YANDEX_KEY'),
                    'folder' => (string) env('TRANSLATION_YANDEX_FOLDER_ID'),
                ],
            ],
        ],

        'options' => [
            /*
             * Set a custom pattern for extracting replaceable keywords from the string,
             * default to extracting words prefixed with a colon.
             *
             *  Available options:
             *
             *     `true` is a `/:(\w+)/`
             *     `false` will disable regular expression processing
             *      `/any regex/` - any regular expression you specify
             *
             *   By default, `true`
             *
             * @example (e.g. "Hello :name" will extract "name")
             */

            'preserve_parameters' => true,
        ],
    ],
];
