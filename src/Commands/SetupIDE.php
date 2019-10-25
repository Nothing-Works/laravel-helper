<?php

namespace LaravelHelper\Commands;

use LaravelHelper\Processes\LaravelRoot;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetupIDE extends Command
{

    protected function configure()
    {
        $this->setName('setupIDE')->setDescription('Setup everything for IDE');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        (new LaravelRoot())->run();
        (new InstallLaravelIDEHelper())->run();
        $output->writeln('done!');
        return 0;
    }
}
        // $io = new SymfonyStyle($input, $output);
        // $io->section('Starting to add helper files');
        // $io->progressStart(2);
        // $io->progressAdvance();
        // $io->progressFinish();
