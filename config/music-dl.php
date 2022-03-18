<?php

/**
 * This file is part of the guanguans/music-dl.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

return [
    'logo' => <<<'logo'
<fg=green;options=bold>
     __  __           _        _____  _      
    |  \/  |         (_)      |  __ \| |     
    | \  / |_   _ ___ _  ___  | |  | | |     
    | |\/| | | | / __| |/ __| | |  | | |     
    | |  | | |_| \__ \ | (__  | |__| | |____ 
    |_|  |_|\__,_|___/_|\___| |_____/|______|                                       
</>
logo,

    'channels' => [
        'tencent',
        // 'netease',
        // 'kugou',
        // 'kuwo',
        // 'baidu',
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
    'search_tips' => '请输入要关键字如：<fg=yellow>一个短篇  腰乐队  Yesterday once more</>，或 <fg=yellow>Ctrl+C</> 退出',
    'win_tips' => '<fg=yellow>CMD、PowerShell 仅支持英文搜索，Git Bash 支持中英文搜索</>',
    'searching' => <<<'searching'
---------------------------------------
正在搜索：<fg=yellow>%s</>，请耐心等待...
---------------------------------------
searching,
    'search_statistics' => '搜索耗时 <fg=yellow>%.2f 秒</>，最大内存占用 <fg=yellow>%.2f</> M',
    'empty_result' => '<fg=yellow>o(╥﹏╥)o 没有搜索到相关歌曲</>',
    'download_tips' => '请输入下载序号，多个用英文逗号隔开如：<fg=yellow>0,6</>，输入 <fg=yellow>all</> 下载全部，输入 <fg=yellow>n</> 跳过下载',
    'input_error' => '<fg=red>o(╥﹏╥)o 输入错误</>',
    'save_path_tips' => <<<'save_path_tips'

已保存到：<fg=yellow>%s</>，请前往查看
save_path_tips,
    'success_icon' => resource_path('icon-success.png'),
];
