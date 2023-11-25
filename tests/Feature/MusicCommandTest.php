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
    $this->downloadDir = base_path('tests/Downloads');
});

it('can search and download music', function (): void {
    $songs = [
        [
            'id' => 1386735587,
            'name' => '在这宁静的水坑路',
            'artist' => ['腰乐队'],
            'album' => '他们说忘了摇滚有问题',
            'pic_id' => '109951164323917099',
            'url_id' => 1386735587,
            'lyric_id' => 1386735587,
            'source' => 'netease',
            'url' => 'http://m7.music.126.net/20231125235223/a8bac3c48d11ce8efe66e89879aa9b43/ymusic/obj/w5zDlMODwrDDiGjCn8Ky/3307387265/081d/9dc7/8d6e/5e354180f0d2925a257c5e2b55037828.mp3',
            'size' => 16259701,
            'br' => 320,
        ],
        [
            'id' => 1409911800,
            'name' => '不只是南方',
            'artist' => ['腰乐队'],
            'album' => '相见恨晚',
            'pic_id' => '109951164552530705',
            'url_id' => 1409911800,
            'lyric_id' => 1409911800,
            'source' => 'netease',
            'url' => 'http://m7.music.126.net/20231125235223/7cdd9fcc39a1329f4a14b77abc616690/ymusic/540c/065f/525d/cfa0a5e6041577485ab7e76ff0c89d58.mp3',
            'size' => 8139799,
            'br' => 128,
        ],
    ];

    $mockSequenceMusic = Mockery::mock(SequenceMusic::class);
    $mockSequenceMusic->allows('search')->andReturn(collect($songs));
    $mockSequenceMusic->allows('download')->andReturnUndefined();
    App\Facades\Music::shouldReceive('driver')->andReturn($mockSequenceMusic->makePartial());

    $options = $this->sanitizes(collect($songs), '不只是南方')
        ->transform(static fn (array $song): string => implode('  ', Arr::except($song, [0])))
        ->prepend(config('music-dl.all_songs'));
    $this
        ->artisan(MusicCommand::class, [
            'keyword' => '不只是南方',
            '--dir' => base_path('tests/Downloads'),
            // '--driver' => 'fork',
            '--no-continue' => true,
            '--sources' => 'netease',
        ])
        ->expectsConfirmation(config('music-dl.confirm_label'), 'yes')
        // ->expectsQuestion(config('music-dl.select_label'), [config('music-dl.all_songs')])
        ->expectsChoice(config('music-dl.select_label'), [config('music-dl.all_songs')], $options->all())
        ->assertSuccessful();
})->group(__DIR__, __FILE__);
