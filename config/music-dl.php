<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

return [
    'logo' => sprintf(<<<'logo'
        <fg=green;options=bold>
             __  __           _        _____  _
            |  \/  |         (_)      |  __ \| |
            | \  / |_   _ ___ _  ___  | |  | | |
            | |\/| | | | / __| |/ __| | |  | | |
            | |  | | |_| \__ \ | (__  | |__| | |____
            |_|  |_|\__,_|___/_|\___| |_____/|______| %s
        </>
        logo, config('app.version')),

    'sources' => [
        'tencent',
        'netease',
        'kugou',
        // 'baidu',
        // 'kuwo',
        // 'xiami',
    ],

    'table_header' => [
        'index' => '序号',
        'name' => '歌名',
        'artist' => '歌手',
        'album' => '专辑',
        'source' => '来源',
        'size' => '大小',
        'br' => '比特率',
    ],

    'keyword_label' => '请输入关键字',
    'keyword_placeholder' => '关键字',
    'keyword_default' => '腰乐队',
    'windows_hint' => 'CMD、PowerShell 可能不支持中文搜索，Git Bash、WSL 支持中英文搜索',
    'searching_hint' => '搜索中...',
    'empty_hint' => 'o(╥﹏╥)o 没有搜索到相关歌曲',
    'confirm_label' => '是否下载歌曲？',
    'all_songs' => '全部歌曲',
    'select_label' => '请选择歌曲',
    'select_hint' => '空格键选中/取消选项',
];
