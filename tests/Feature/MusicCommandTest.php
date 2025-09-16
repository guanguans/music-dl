<?php

/** @noinspection AnonymousFunctionStaticInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection StaticClosureCanBeUsedInspection */
declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

use App\Commands\MusicCommand;
use App\Concerns\Hydrator;
use App\Exceptions\RuntimeException;
use App\Music;
use Illuminate\Support\Collection;

uses(Hydrator::class)->beforeEach(function (): void {
    // Prompt::fallbackWhen(true);
});

it('can search and download music', function (Collection $songs): void {
    $this->app->singleton(Music::class, static function () use ($songs) {
        $mockMusic = Mockery::mock(Music::class);
        $mockMusic->allows('search')->andReturn($songs);
        $mockMusic->allows('download')->andThrow(new RuntimeException);

        return $mockMusic->makePartial();
    });

    $this
        ->artisan(MusicCommand::class, [
            'keyword' => $keyword = '不只是南方',
            '--dir' => downloads_path(),
            '--driver' => 'sync',
            '--break' => true,
            '--sources' => config('app.sources'),
        ])
        ->expectsConfirmation(__('confirm_label'), 'yes')
        // ->expectsQuestion(__('select_label'), [__('all_songs')])
        ->expectsChoice(
            __('select_label'),
            [__('all_songs')],
            $this->hydrates($songs, $keyword)->all()
        )
        ->assertSuccessful();
})->group(__DIR__, __FILE__)->with('songs');
