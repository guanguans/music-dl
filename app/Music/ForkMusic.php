<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 guanguans<ityaozm@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/guanguans/music-dl
 */

namespace App\Music;

use Spatie\Fork\Fork;

final class ForkMusic extends SequenceMusic
{
    /**
     * @noinspection PhpMissingParentCallCommonInspection
     */
    #[\Override]
    protected function ensureWithUrls(array $withoutUrlSongs): array
    {
        return Fork::new()
            ->before()
            ->after()
            ->concurrent($this->toConcurrent($withoutUrlSongs))
            ->run(...array_map(
                fn (array $withoutUrlSong): callable => fn (): array => $this->ensureWithUrl($withoutUrlSong),
                $withoutUrlSongs
            ));
    }
}
