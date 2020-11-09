<?php

namespace LaravelHelper\Commands;

use LaravelHelper\Processes\ClearCache;
use LaravelHelper\Processes\ClearCompiled;
use LaravelHelper\Processes\Generate;
use LaravelHelper\Processes\InstallLaravelIDEHelper;
use LaravelHelper\Processes\LaravelRoot;
use LaravelHelper\Processes\Meta;
use LaravelHelper\Processes\Models;
use LaravelHelper\Processes\PublishVendor;
use LaravelHelper\Processes\RemoveVendor;
use LaravelHelper\Scripts\CreatingRootFiles;
use LaravelHelper\Scripts\ModifyComposer;
use LaravelHelper\Scripts\ModifyConfig;
use LaravelHelper\Scripts\ResetComposer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetupIDE extends Command
{
    private $allClasses = [LaravelRoot::class, ClearCache::class, ResetComposer::class, InstallLaravelIDEHelper::class, RemoveVendor::class, PublishVendor::class, ModifyConfig::class,  ModifyComposer::class, CreatingRootFiles::class, ClearCompiled::class, Generate::class, Meta::class, Models::class];

    protected function configure()
    {
        $this->setName('setupIDE')->setDescription('Setup everything for IDE');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        (new ProcessCommands($output, $this->allClasses))->process();

        return 0;
    }
}
