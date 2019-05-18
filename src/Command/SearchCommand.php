<?php

/*
 * This file is part of the guanguans/music-php.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\MusicPhp\Command;

use Symfony\Component\Console\Command\Command;
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
        $output->writeln('test');
    }
}
