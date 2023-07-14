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
        'index' => '<fg=green;options=bold>序号</>',
        'name' => '<fg=green;options=bold>歌名</>',
        'artist' => '<fg=green;options=bold>歌手</>',
        'album' => '<fg=green;options=bold>专辑</>',
        'source' => '<fg=green;options=bold>来源</>',
        'size' => '<fg=green;options=bold>大小</>',
        'br' => '<fg=green;options=bold>比特率</>',
    ],

    'splitter' => '-------------------------------',
    'search_tip' => '请输入关键字如：<fg=yellow>一个短篇  腰乐队  Yesterday once more</>，或按 <fg=yellow>Ctrl+C</> 退出程序',
    'windows_tip' => '<fg=yellow>CMD、PowerShell 可能不支持中文搜索，Git Bash 支持中英文搜索</>',
    'searching' => '正在搜索：<fg=yellow>%s</>，请耐心等待...',
    'search_statistics' => '搜索耗时 <fg=yellow>%.2f 秒</>、内存 <fg=yellow>%.2f</> M',
    'empty_result' => '<fg=yellow>o(╥﹏╥)o 没有搜索到相关歌曲</>',
    'confirm_download' => '是否下载歌曲?',
    'download_all_songs' => '下载所有歌曲',
    'download_choice_tip' => '请按上下键选择，或直接输入序号，多个序号请用英文逗号隔开如：<fg=yellow>0,6</>',
    'download_success_tip' => PHP_EOL.'已保存到：<fg=yellow>%s</>，请前往查看',
    'download_failed_tip' => PHP_EOL.'下载失败：<fg=red>%s</>',
    'input_error' => '<fg=red>o(╥﹏╥)o 输入错误</>',
    'exception_tip' => '<fg=red>o(╥﹏╥)o 发生了什么：</><fg=yellow>%s</>',
    'success_icon' => resource_path('success-icon.png'),
];
