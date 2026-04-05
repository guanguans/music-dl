<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Support;

use Composer\Script\Event;
use GrahamCampbell\ResultType\Error;
use GrahamCampbell\ResultType\Result;
use GrahamCampbell\ResultType\Success;
use Illuminate\Pipeline\Pipeline;
use Rector\Config\RectorConfig;
use Rector\DependencyInjection\LazyContainerFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @see https://github.com/laravel/framework/blob/12.x/src/Illuminate/Foundation/ComposerScripts.php
 *
 * @internal
 *
 * @property \Symfony\Component\Console\Output\ConsoleOutput $output
 *
 * @method void configureIO(InputInterface $input, OutputInterface $output)
 */
final class ComposerScripts
{
    /**
     * @see \PhpCsFixer\Hasher
     * @see \PhpCsFixer\Utils
     */
    private function __construct() {}

    public static function lintReadme(Event $event): int
    {
        self::requireAutoload($event);

        /**
         * @param \Closure(string, string): \GrahamCampbell\ResultType\Result $checker
         *
         * @return \Closure(array, \Closure): array
         */
        $pipeWrapper = static fn (\Closure $checker): \Closure => static function (
            array $translatedReadmes,
            \Closure $next
        ) use ($checker, $event): array {
            foreach ($translatedReadmes as $translatedReadme) {
                if ($value = $checker($translatedReadme, 'README.md')->error()->getOrElse(null)) {
                    $event->getIO()->error($value);

                    exit(1);
                }
            }

            return $next($translatedReadmes);
        };

        new Pipeline(app())
            ->send(glob('README-*.md'))
            ->through([
                $pipeWrapper(
                    static fn (
                        string $translatedReadme,
                        string $readme
                    ): Result => \count(file($translatedReadme)) !== \count(file($readme))
                        ? Error::create("The file [$translatedReadme] has a different number of lines than [$readme]")
                        : Success::create('ok')
                ),
                $pipeWrapper(static function (string $translatedReadme, string $readme) use ($event): Result {
                    $translatedReadmeFile = file($translatedReadme);

                    foreach (file($readme) as $lineNumber => $line) {
                        /** @noinspection NotOptimalIfConditionsInspection */
                        /** @noinspection OffsetOperationsInspection */
                        if (
                            $line !== $translatedReadmeFile[$lineNumber]
                            && str($line)->trim()->isNotEmpty()
                            && str($line)->startsWith([
                                // Markdown title
                                '#',
                                '##',
                                '###',
                                '####',
                                '#####',
                                '######',
                                // Markdown list
                                '-',
                                '*',
                                // Markdown link
                                '[',
                                // Markdown image
                                '![',
                                // Markdown code
                                '```',
                                // Markdown table
                                '|-',
                                '|',
                                '-',
                                // Markdown blockquote
                                '>',
                                // Markdown horizontal rule
                                '---',
                                // Markdown bold
                                '**',
                                // Markdown italic
                                '*',
                                // Markdown strikethrough
                                '~~',
                                // Markdown inline code
                                '`',
                                // Markdown footnote
                                '[^',
                                // Markdown superscript
                                '^',
                                // Markdown subscript
                                '_',
                                // Markdown escape
                                '\\',
                                // Markdown HTML
                                '<',
                                // Markdown comment
                                '<!--',
                                '[//]: # (',
                            ])
                            && !str($translatedReadmeFile[$lineNumber])->startsWith(str($line)->before(' ')->append(' '))
                        ) {
                            /** @noinspection OffsetOperationsInspection */
                            $event->getIO()->writeErrorRaw([$line, $translatedReadmeFile[$lineNumber]]);

                            return Error::create(\sprintf(
                                'The file [%s] has a different markdown line [%s] than [%s]',
                                $translatedReadme,
                                $lineNumber + 1,
                                $readme
                            ));
                        }
                    }

                    return Success::create('ok');
                }),
            ]);

        $event->getIO()->info('No errors');

        return 0;
    }

    public static function makeRectorConfig(): RectorConfig
    {
        static $rectorConfig;

        return $rectorConfig ??= (new LazyContainerFactory)->create();
    }

    /**
     * @noinspection PhpPossiblePolymorphicInvocationInspection
     */
    public static function requireAutoload(Event $event, ?bool $enableDebugging = null): void
    {
        $enableDebugging ??= (new ArgvInput)->hasParameterOption('-vvv', true);
        $enableDebugging and $event->getIO()->enableDebugging(microtime(true));
        (fn () => $this->output->setVerbosity(OutputInterface::VERBOSITY_DEBUG))->call($event->getIO());

        require_once $event->getComposer()->getConfig()->get('vendor-dir').\DIRECTORY_SEPARATOR.'autoload.php';
    }

    /**
     * @param null|list<string> $argv
     */
    public static function makeArgvInput(?array $argv = null, ?InputDefinition $inputDefinition = null): ArgvInput
    {
        static $argvInput;

        return $argvInput ??= new ArgvInput($argv, $inputDefinition);
    }

    /**
     * @see \Rector\Console\Style\SymfonyStyleFactory
     */
    public static function makeSymfonyStyle(?InputInterface $input = null, ?OutputInterface $output = null): SymfonyStyle
    {
        static $symfonyStyle;

        if (
            $symfonyStyle instanceof SymfonyStyle
            && (
                !$input instanceof InputInterface
                || (string) \Closure::bind(
                    static fn (SymfonyStyle $symfonyStyle): InputInterface => $symfonyStyle->input,
                    null,
                    SymfonyStyle::class
                )($symfonyStyle) === (string) $input
            )
            && (
                !$output instanceof OutputInterface
                || \Closure::bind(
                    static fn (SymfonyStyle $symfonyStyle): OutputInterface => $symfonyStyle->output,
                    null,
                    SymfonyStyle::class
                )($symfonyStyle) === $output
            )
        ) {
            return $symfonyStyle;
        }

        $input ??= new ArgvInput;
        $output ??= new ConsoleOutput;

        // to configure all -v, -vv, -vvv options without memory-lock to Application run() arguments
        (fn () => $this->configureIO($input, $output))->call(new Application);

        // --debug or --xdebug is called
        if ($input->hasParameterOption(['--debug', '--xdebug'], true)) {
            $output->setVerbosity(OutputInterface::VERBOSITY_DEBUG);
        }

        // disable output for testing
        if (self::isRunningInTesting()) {
            $output->setVerbosity(OutputInterface::VERBOSITY_QUIET);
        }

        return $symfonyStyle = new SymfonyStyle($input, $output);
    }

    public static function isRunningInTesting(): bool
    {
        return 'testing' === getenv('ENV');
    }
}
