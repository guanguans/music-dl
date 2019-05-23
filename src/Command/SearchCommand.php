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
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class SearchCommand extends Command
{
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
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        start:

        $config = config();
        $output->writeln($config['search_tips']);

        $helper = $this->getHelper('question');
        $question = new Question($config['input']);
        $keyword = trim($helper->ask($input, $output, $question));

        if (empty($keyword)) {
            $output->writeln($config['input_error']);
            goto start;
        }

        $output->writeln($config['splitter']);
        $output->writeln(str_replace('{$keyword}', $keyword, $config['searching']));

        $musicPhp = $this->getMusicPhp();
        $songs = $musicPhp->searchAll($keyword);

        if (empty($songs)) {
            $output->writeln($config['empty_result']);
            goto start;
        }

        $table = $this->getTable($output);
        $table
            ->setHeaders($config['table_headers'])
            ->setRows($musicPhp->formatAll($songs, $keyword));
        $table->render();

        serialNumber:

        $output->writeln($config['download_tips']);
        $question = new Question('>>: ');
        $serialNumber = trim($helper->ask($input, $output, $question));

        if ('n' === $serialNumber || 'N' === $serialNumber) {
            goto start;
        } elseif ($serialNumber < 0 || $serialNumber >= count($songs)) {
            $output->writeln($config['input_error']);
            goto serialNumber;
        }

        $song = ($songs)[$serialNumber];
        $table = $this->getTable($output);
        $table->setHeaders($musicPhp->format($song, $keyword));
        $table->render();

        $output->writeln($config['downloading']);
        $musicPhp->download($song);
        $output->writeln(str_replace(['{$artist}', '{$name}'], [implode(',', $song['artist']), $song['name']], $config['save_path']));
        $output->writeln($config['splitter']);

        goto start;
    }

    /**
     * @return \Guanguans\MusicPhp\MusicPhp
     */
    public function getMusicPhp()
    {
        return new MusicPhp();
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Symfony\Component\Console\Helper\Table
     */
    public function getTable(OutputInterface $output)
    {
        return new Table($output);
    }
}
