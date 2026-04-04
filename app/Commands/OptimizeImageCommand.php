<?php

/** @noinspection ClassOverridesFieldOfSuperClassInspection */
/** @noinspection PhpInapplicableAttributeTargetDeclarationInspection */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Collection;
use Illuminate\Support\Number;
use LaravelZero\Framework\Commands\Command;
use Spatie\ImageOptimizer\OptimizerChain;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

final class OptimizeImageCommand extends Command
{
    #[\Override]
    protected $signature = 'optimize:image {--dry-run : Only list found images}';

    #[\Override]
    protected $description = 'Optimize images';

    public function handle(): void
    {
        $imagesFinder = static fn (): Collection => collect(
            Finder::create()
                ->in(getcwd())
                ->exclude(['.build/', 'Fixtures/', 'vendor-bin/', 'vendor/'])
                ->name(['/\.jpg$/', '/\.jpeg$/', '/\.png$/', '/\.gif$/', '/\.webp$/', '/\.svg$/', '/\.avif$/'])
                ->size('> 0')
                ->ignoreDotFiles(false)
                ->ignoreUnreadableDirs(false)
                ->ignoreVCS(true)
                ->ignoreVCSIgnored(true)
                ->files()
        )->map(static fn (SplFileInfo $image): array => [
            'size' => $image->getSize(),
            'human_size' => Number::fileSize($image->getSize()),
            'real_path' => $image->getRealPath(),
        ]);

        if ($this->option('dry-run')) {
            $imagesFinder()
                ->tap(fn (Collection $images) => $this->components->info("Found {$images->count()} images:"))
                ->each(fn (array $image) => $this->components->twoColumnDetail($image['real_path'], $image['human_size']));

            return;
        }

        $imagesFinder()
            ->tap(fn (Collection $images) => $this->components->info("Optimizing {$images->count()} images:"))
            ->each(fn (array $image) => $this->components->task(
                $image['real_path'],
                static fn () => resolve(OptimizerChain::class)->optimize($image['real_path'])
            ))
            ->tap(fn (Collection $images) => $this->components->info("Optimization results for {$images->count()} images:"))
            ->tap(fn (Collection $images) => $imagesFinder()->each(function (array $fileInfo, string $file) use ($images): void {
                $originalSize = $images->get($file)['size'];
                // $percentage = \sprintf('(%.2f%%)', ($originalSize - $fileInfo['size']) / $originalSize * 100);
                $percentage = Number::percentage(($originalSize - $fileInfo['size']) / $originalSize * 100, 1);
                $this->components->twoColumnDetail(
                    $file,
                    "{$images->get($file)['human_size']} -> {$fileInfo['human_size']} ($percentage)"
                );
            }));
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function isEnabled(): bool
    {
        return !$this->laravel->isProduction();
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(self::class)->everyMinute();
    }
}
