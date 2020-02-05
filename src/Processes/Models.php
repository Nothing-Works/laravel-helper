<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class Models extends BaseProcess implements IRunnable
{
    public string $message = 'Model files..';

    protected array $command = ['php', 'artisan', 'ide-helper:models', '-N'];
}
