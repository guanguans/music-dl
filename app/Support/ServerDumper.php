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

namespace App\Support;

use Illuminate\Foundation\Console\CliDumper;
use Illuminate\Foundation\Http\HtmlDumper;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\VarDumper\Caster\ReflectionCaster;
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\ContextProvider\ContextProviderInterface;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextualizedDumper;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use Symfony\Component\VarDumper\Server\Connection;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @method list<ContextProviderInterface> getDefaultContextProviders()
 */
final readonly class ServerDumper implements DataDumperInterface
{
    private Connection $connection;
    private DataDumperInterface $fallbackDumper;

    /**
     * @param null|list<ContextProviderInterface> $contextProviders
     */
    public function __construct(
        string $host,
        ?DataDumperInterface $fallbackDumper = null,
        ?array $contextProviders = null,
    ) {
        $this->fallbackDumper = method_exists(
            $fallbackDumper ??= (
                app()->runningInConsole()
                    ? new CliDumper(new ConsoleOutput, app()->basePath(), config('view.compiled'))
                    : new HtmlDumper(app()->basePath(), config('view.compiled')) // @codeCoverageIgnore
            ),
            'dumpWithSource'
        )
            ? $fallbackDumper
            : new ContextualizedDumper(
                $fallbackDumper,
                [new SourceContextProvider]
            );

        $this->connection = new Connection(
            $host,
            $contextProviders ?? (fn (): array => $this->getDefaultContextProviders())->call(new VarDumper)
        );
    }

    /**
     * Create a new Server dumper instance and register it as the default dumper.
     *
     * @see https://symfony.com/doc/current/components/var_dumper.html
     * @see \Symfony\Component\VarDumper\Dumper\ServerDumper
     * @see \Symfony\Component\VarDumper\VarDumper::register()
     * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerDumper()
     * @see \Illuminate\Foundation\Console\CliDumper::register()
     * @see \Illuminate\Foundation\Http\HtmlDumper::register()
     *
     * @noinspection PhpVoidFunctionResultUsedInspection
     */
    public static function register(
        string $host,
        ?DataDumperInterface $fallbackDumper = null,
        ?array $contextProviders = null,
        ?ClonerInterface $cloner = null,
    ): void {
        new FoundationServiceProvider(app())->registerDumper();

        $cloner ??= tap(new VarCloner, static function (VarCloner $varCloner): void {
            $varCloner->addCasters(ReflectionCaster::UNSET_CLOSURE_FILE_INFO);
        });

        $dumper = new self($host, $fallbackDumper, $contextProviders);

        VarDumper::setHandler(static function (mixed $var, ?string $label = null) use ($cloner, $dumper): void {
            $var = $cloner->cloneVar($var);

            if (null !== $label) {
                $var = $var->withContext(['label' => $label]); // @codeCoverageIgnore
            }

            $dumper->dump($var);
        });
    }

    /**
     * @noinspection PhpUnused
     */
    public function getContextProviders(): array
    {
        return $this->connection->getContextProviders();
    }

    /**
     * @noinspection PhpVoidFunctionResultUsedInspection
     */
    public function dump(Data $data): ?string
    {
        if (!$this->connection->write($data)) {
            return method_exists($this->fallbackDumper, 'dumpWithSource')
                ? $this->fallbackDumper->dumpWithSource($data)
                : $this->fallbackDumper->dump($data);
        }

        return null; // @codeCoverageIgnore
    }
}
