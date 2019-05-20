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
use Guanguans\MusicPhp\I18n\MusicPhpZhCN;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SearchCommand extends Command
{
    protected $songs = [];

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input  = $input;
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
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        start:

        $output->writeln(MusicPhpZhCN::$search_tips);

        $helper   = $this->getHelper('question');
        $question = new Question(MusicPhpZhCN::$input);
        $keyword  = $helper->ask($input, $output, $question);
        $output->writeln(MusicPhpZhCN::$splitter);
        $output->writeln(str_replace('{$keyword}', $keyword, MusicPhpZhCN::$searching));
        $musicPhp = new MusicPhp();
        $songs    = $musicPhp->searchAll($keyword);
        if (empty($songs)) {
            $output->writeln(MusicPhpZhCN::$empty_result);
            goto start;
        }

        $this->songs = $songs;
        $table       = new Table($output);
        $table
            ->setHeaders(MusicPhpZhCN::$headers)
            ->setRows($musicPhp->formatAll($songs, $keyword));
        $table->render();

        serialNumber:

        $output->writeln(MusicPhpZhCN::$download_tips);
        $question = new Question('>>: ');
        $reply    = trim($helper->ask($input, $output, $question));
        if ('n' === $reply || 'N' === $reply) {
            goto start;
        }
        $song = ($this->songs)[$reply];
        if (empty($song)) {
            $output->writeln(MusicPhpZhCN::$input_error);
            goto serialNumber;
        }

        $table = new Table($output);
        $table->setHeaders(array_values($musicPhp->format($song, $keyword)));
        $table->render();
        $output->writeln(MusicPhpZhCN::$downloading);
        $musicPhp->download(($this->songs)[$reply]);
        $output->writeln(str_replace('{$name}', $name, MusicPhpZhCN::$save_path));
        $output->writeln(MusicPhpZhCN::$splitter);

        goto start;
    }
}
