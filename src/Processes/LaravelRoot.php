<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class LaravelRoot extends BaseProcess implements IRunnable
{
    public string $message = 'Checking if it is the root dir';

    protected array $command = ['php', 'artisan'];

    protected string $reason = 'It is not the root of Laravel';
}
