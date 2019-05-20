<?php
/**.-----------------------------------------------
 * |   Author: guanguans <yzmguanguan@gmail.com>
 * |   Date: 2019-05-20 16:52
 * '---------------------------------------------*/

namespace Guanguans\MusicPhp\I18n;


class MusicPhpZhCN
{
    public static $headers = [
        'serial_number' => '序号',
        'name'          => '歌名',
        'artist'        => '歌手',
        'album'         => '专辑',
        'source'        => '来源',
        'size'          => '大小',
        'br'            => '比特率',
    ];

    public static $search_tips = '请输入要关键字如: <info>一个短篇 腰乐队 相见恨晚</info>，或 <info>Ctrl+C</info> 退出';

    public static $splitter = '--------------------------------------------';

    public static $input = '>>: ';

    public static $searching = '正在搜索 <info>{$keyword}</info> ，请耐心等待...';

    public static $downloading = '正在下载... [####################################]  50%';

    public static $empty_result = '无结果';

    public static $download_tips = '请输入下载序号，支持形如 0 3-5 8 的格式，输入 N 跳过下载';

    public static $input_error = '输入错误，请重新输入';

    public static $save_path = '已保存到: ./{$name}.{$extension}，请前往查看';
}