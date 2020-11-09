<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class ClearCache extends BaseProcess implements IRunnable
{
    public string $message = 'Clearing Laravel Cache.';

    protected array $command = ['php', 'artisan', 'cache:clear'];
}
