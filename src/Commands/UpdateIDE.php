<?php

namespace LaravelHelper\Commands;

use LaravelHelper\Processes\ClearCompiled;
use LaravelHelper\Processes\Generate;
use LaravelHelper\Processes\Meta;
use LaravelHelper\Processes\Models;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateIDE extends Command
{
    private $allClasses = [ClearCompiled::class, Generate::class, Meta::class, Models::class];

    protected function configure()
    {
        $this->setName('updateIDE')->setDescription('Update everything for IDE');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        (new ProcessCommands($output, $this->allClasses))->process();
    }
}
