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
use Mockery\Exception\InvalidOrderException;

it('can search and download music', function (): void {
    $this
        ->artisan(MusicCommand::class, [
            'keyword' => '不只是南方',
            '--driver' => 'fork',
            '--sources' => 'netease',
        ])
        ->expectsConfirmation(config('music-dl.confirm_download'), 'yes')
        ->expectsQuestion(config('music-dl.download_choice_tip'), '下载所有歌曲')
        ->assertSuccessful();
})->group(__DIR__, __FILE__)->throws(InvalidOrderException::class);
