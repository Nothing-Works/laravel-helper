<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class Meta extends BaseProcess implements IRunnable
{
    public string $message = 'Meta files..';

    protected array $command = ['php', 'artisan', 'ide-helper:meta'];
}
