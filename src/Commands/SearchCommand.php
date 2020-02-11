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
            ->setDescription('Search and download songs')
            ->addArgument(
                'search',
                InputArgument::OPTIONAL,
                'Search and download songs'
            );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = config();
        $output->writeln($config['logo']);

        start:

        $output->writeln($config['search_tips']);
        if (OsHelper::isWindows()) {
            $output->writeln($config['win_tips']);
        }

        $helper = $this->getHelper('question');
        $question = new Question($config['input']);
        $keyword = trim($helper->ask($input, $output, $question));

        if (empty($keyword)) {
            $output->writeln($config['input_error']);
            goto start;
        }

        $output->writeln($config['splitter']);
        $output->writeln(sprintf($config['searching'], $keyword));

        $music = $this->getMusic();
        $songs = $music->searchAll($keyword);

        if (empty($songs)) {
            $output->writeln($config['empty_result']);
            goto start;
        }

        $table = $this->getTable($output);
        $table
            ->setHeaders($config['table_headers'])
            ->setRows($music->formatAll($songs, $keyword));
        $table->render();

        serialNumber:

        $output->writeln($config['download_tips']);
        $question = new Question($config['input']);
        $serialNumber = trim($helper->ask($input, $output, $question));

        if ('n' === $serialNumber || 'N' === $serialNumber) {
            goto start;
        } elseif ($serialNumber < 0 || $serialNumber >= count($songs) || !preg_match('/^[0-9,]*$/', $serialNumber)) {
            $output->writeln($config['input_error']);
            goto serialNumber;
        }
        $serialNumbers = explode(',', trim($serialNumber, ','));

        foreach ($serialNumbers as $serialNumber) {
            $song = $songs[$serialNumber];
            $table = $this->getTable($output);
            $table->setHeaders($music->format($song, $keyword));
            $table->render();

            $output->writeln($config['downloading']);
            $music->download($song);
            $output->writeln(sprintf($config['save_path'], get_downloads_dir(), implode(',', $song['artist']), $song['name']));
            $output->writeln($config['splitter']);
        }

        goto start;
    }

    /**
     * @return \Guanguans\MusicPHP\Music
     */
    public function getMusic(): Music
    {
        return new Music();
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Symfony\Component\Console\Helper\Table
     */
    public function getTable(OutputInterface $output): Table
    {
        return new Table($output);
    }
}
