<?php

namespace LaravelHelper\Commands;

use LaravelHelper\Scripts\ModifyComposer;
use LaravelHelper\Processes\InstallLaravelIDEHelper;
use LaravelHelper\Processes\LaravelRoot;
use LaravelHelper\Processes\PublishVendor;
use LaravelHelper\Processes\RemoveVendor;
use LaravelHelper\Scripts\CreatingRootFiles;
use LaravelHelper\Scripts\ModifyConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SetupIDE extends Command
{

    private $classNames = [LaravelRoot::class, InstallLaravelIDEHelper::class, RemoveVendor::class, PublishVendor::class, ModifyConfig::class,  ModifyComposer::class, CreatingRootFiles::class];

    protected function configure()
    {
        $this->setName('setupIDE')->setDescription('Setup everything for IDE');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->progressStart(count($this->classNames));
        $count = 1;
        foreach ($this->classNames as  $value) {
            $io->progressAdvance($count);
            $count++;
            $c = new $value;
            $io->section($c->message);
            $c->run();
        }
        $io->progressFinish();
        return 0;
    }
}
