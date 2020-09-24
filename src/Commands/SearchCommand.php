<?php

declare(strict_types=1);

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPHP\Commands;

use Guanguans\MusicPHP\Music;
use Joli\JoliNotif\Notification;
use Joli\JoliNotif\Notifier;
use Joli\JoliNotif\NotifierFactory;
use Joli\JoliNotif\Util\OsHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class SearchCommand extends Command
{
    /**
     * @var \Symfony\Component\Console\Input\InputInterface
     */
    protected $input;

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    protected $config;

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
        $this->config = config();
    }

    protected function configure()
    {
        $this
            ->setName('search')
            ->setDescription('Search and download songs')
            ->addArgument(
                'search',
                InputArgument::OPTIONAL,
                'Search and download songs'
            );
    }

    /**
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->config['logo']);

        start:

        $output->writeln($this->config['search_tips']);
        if (OsHelper::isWindows()) {
            $output->writeln($this->config['win_tips']);
        }

        $helper = $this->getHelper('question');
        $question = new Question($this->config['input']);
        $keyword = trim($helper->ask($input, $output, $question));

        if (empty($keyword)) {
            $output->writeln($this->config['input_error']);
            goto start;
        }

        $output->writeln($this->config['splitter']);
        $output->writeln(sprintf($this->config['searching'], $keyword));

        $music = $this->getMusic();

        $startTime = microtime(true);
        $songs = $music->searchAll($keyword);
        $endTime = microtime(true);

        if (empty($songs)) {
            $output->writeln($this->config['empty_result']);
            goto start;
        }

        $table = $this->getTable($output);
        $table
            ->setHeaders($this->config['table_headers'])
            ->setRows($music->formatAll($songs, $keyword));
        $table->render();
        $output->writeln(sprintf('搜索耗时 %s 秒', round($endTime - $startTime, 1)));

        serialNumber:

        $output->writeln($this->config['download_tips']);
        $question = new Question($this->config['input']);
        $serialNumber = trim($helper->ask($input, $output, $question));

        if ('N' === $serialNumber) {
            goto start;
        }
        if ('ALL' !== $serialNumber && ($serialNumber < 0 || $serialNumber >= count($songs) || !preg_match('/^[0-9,]*$/', $serialNumber))) {
            $output->writeln($this->config['input_error']);
            goto serialNumber;
        }
        $serialNumbers = explode(',', trim($serialNumber, ','));
        if ('ALL' === $serialNumber) {
            $serialNumbers = array_keys($songs);
        }

        foreach ($serialNumbers as $serialNumber) {
            $song = $songs[$serialNumber];
            $table = $this->getTable($output);
            $table->setHeaders($music->format($song, $keyword));
            $table->render();

            $output->writeln($this->config['downloading']);
            $music->download($song);
            $savePath = sprintf($this->config['save_path'], get_downloads_dir(), implode(',', $song['artist']), $song['name']);
            $output->writeln($savePath);
            $this->getNotifier()->send($this->getNotification(str_replace(['<info>', '</info>'], '', $savePath)));
            $output->writeln($this->config['splitter']);
        }

        goto start;
    }

    public function getMusic(): Music
    {
        return new Music();
    }

    public function getTable(OutputInterface $output): Table
    {
        return new Table($output);
    }

    public function getNotifier(): Notifier
    {
        return NotifierFactory::create();
    }

    public function getNotification(string $body): Notification
    {
        return (new Notification())
            ->setTitle('Music PHP')
            ->setBody($body)
            ->setIcon($this->config['icon_success'])
            ->addOption('sound', 'Frog'); // Only works on macOS (AppleScriptNotifier)
    }
}
