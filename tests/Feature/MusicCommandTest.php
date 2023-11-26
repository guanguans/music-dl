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
use App\Concerns\Sanitizer;
use App\Music\SequenceMusic;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Laravel\Prompts\Prompt;

uses(Sanitizer::class);

beforeEach(function (): void {
    Prompt::fallbackWhen(true);
});

it('can search and download music', function ($originalSongs): void {
    $mockSequenceMusic = Mockery::mock(SequenceMusic::class);
    $mockSequenceMusic->allows('search')->andReturn(collect($originalSongs));
    $mockSequenceMusic->allows('download')->andReturnUndefined();
    App\Facades\Music::shouldReceive('driver')->andReturn($mockSequenceMusic->makePartial());

    $options = $this->sanitizes(collect($originalSongs), '不只是南方')
        ->transform(static fn (array $song): string => implode('  ', Arr::except($song, [0])))
        ->prepend(config('music-dl.all_songs'));
    $this
        ->artisan(MusicCommand::class, [
            'keyword' => '不只是南方',
            '--dir' => downloads_path(),
            // '--driver' => 'fork',
            '--no-continue' => true,
            '--sources' => 'netease',
        ])
        ->expectsConfirmation(config('music-dl.confirm_label'), 'yes')
        // ->expectsQuestion(config('music-dl.select_label'), [config('music-dl.all_songs')])
        ->expectsChoice(config('music-dl.select_label'), [config('music-dl.all_songs')], $options->all())
        ->assertSuccessful();
})->group(__DIR__, __FILE__)->with('originalSongs');
