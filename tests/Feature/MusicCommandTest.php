<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use App\Commands\MusicCommand;
use App\Concerns\Hydrator;
use App\Music\SequenceMusic;
use Illuminate\Support\Collection;
use Laravel\Prompts\Prompt;

uses(Hydrator::class)->beforeEach(function (): void {
    // Prompt::fallbackWhen(true);
});

it('can search and download music', function (Collection $songs): void {
    $mockSequenceMusic = Mockery::mock(SequenceMusic::class);
    $mockSequenceMusic->allows('search')->andReturn($songs);
    $mockSequenceMusic->allows('download')->andThrow(new RuntimeException());
    App\Facades\Music::shouldReceive('driver')->andReturn($mockSequenceMusic->makePartial());

    $this
        ->artisan(MusicCommand::class, [
            'keyword' => $keyword = '不只是南方',
            '--dir' => downloads_path(),
            '--driver' => 'sequence',
            '--no-continue' => true,
            '--sources' => config('app.sources'),
        ])
        ->expectsConfirmation(__('confirm_label'), 'yes')
        // ->expectsQuestion(__('select_label'), [__('all_songs')])
        ->expectsChoice(
            __('select_label'),
            [__('all_songs')],
            $this->hydrates(collect($songs), $keyword)->all()
        )
        ->assertSuccessful();
})->group(__DIR__, __FILE__)->with('songs');
