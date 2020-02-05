<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class Generate extends BaseProcess implements IRunnable
{
    public string $message = 'Generating files..';

    protected array $command = ['php', 'artisan', 'ide-helper:generate'];
}
