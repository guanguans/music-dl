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
use Illuminate\Support\Facades\File;
use Mockery\Exception\InvalidOrderException;

beforeEach(function (): void {
    $this->downloadDir = base_path('tests/Download');
});

it('can search and download music', function (): void {
    File::cleanDirectory($this->downloadDir);

    $this
        ->artisan(MusicCommand::class, [
            'keyword' => '不只是南方',
            '--driver' => 'fork',
            '--dir' => base_path('tests/Download'),
            '--sources' => 'netease',
        ])
        ->expectsConfirmation(config('music-dl.confirm_download'), 'yes')
        ->expectsQuestion(config('music-dl.download_choice_tip'), '下载所有歌曲')
        ->assertSuccessful();
})
    ->group(__DIR__, __FILE__)
    ->throws(InvalidOrderException::class)
    ->skip(PHP_OS_FAMILY !== 'Darwin');

it('can find downloaded music', function (): void {
    expect(File::files($this->downloadDir))
        ->toBeArray()
        ->toBeTruthy()
        ->not->toBeEmpty();
})
    ->group(__DIR__, __FILE__)
    ->depends('it can search and download music')
    ->skip(PHP_OS_FAMILY !== 'Darwin');
