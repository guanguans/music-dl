<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPhp\Command;

use Guanguans\MusicPhp\MusicPhp;
use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class SearchCommand extends Command
{
    protected $songs = [];

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    protected function configure()
    {
        $this
            ->setName('search')
            ->setDescription('search and download songs')
            ->addArgument(
                'search',
                InputArgument::OPTIONAL,
                'search and download songs'
            );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return null|int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        start:
        $output->writeln('请输入要关键字如（腰乐队 情人），或 Ctrl+C 退出');
        $helper = $this->getHelper('question');
        $question = new Question('>>: ');
        $keyword = $helper->ask($input, $output, $question);
        $output->writeln('正在搜索 '.$keyword.' 来自 ... FLAC ... QQ ... KUGOU ... NETEASE ... BAIDU ...');
        $output->writeln('---------------------------');
        $musicPhp = new MusicPhp();
        $musicPhp->setKeyword($keyword);
        $songs = $musicPhp->searchAll();
        if (empty($songs)) {
            $output->writeln('无结果');
            goto start;
        }
        $this->songs = $songs;
        $table = new Table($output);
        $table
            ->setHeaders(['序号', '歌名', '歌手', '专辑', '大小', '来源', '比特率'])
            ->setRows($musicPhp->format($songs));
        $table->render();
        serialNumber:
        $output->writeln('请输入下载序号，支持形如 0 3-5 8 的格式，输入 N 跳过下载');
        $question = new Question('>>: ');
        $reply = trim($helper->ask($input, $output, $question));
        if ('n' === $reply || 'N' === $reply) {
            goto start;
        }
        $song = ($this->songs)[$reply];
        if (empty($song)) {
            $output->writeln('输入错误，请重新输入');
            goto serialNumber;
        }
        $table = new Table($output);
        $table->setHeaders(array_values($musicPhp->formatDan($song)));
        $table->render();
        $output->writeln('下载中...  [####################################]  50%');
        $musicPhp->setHttpClient(new Client());
        $musicPhp->download(($this->songs)[$reply]);
        $output->writeln('已保存到: ./'.$song['name'].'.mp3');
        $output->writeln('---------------------------');
        goto start;
    }
}
