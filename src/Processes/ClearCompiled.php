<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class ClearCompiled extends BaseProcess implements IRunnable
{
    public string $message = 'Clear Compiled files';

    protected array $command = ['php', 'artisan', 'clear-compiled'];
}
