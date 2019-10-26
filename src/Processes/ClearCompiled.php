<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class ClearCompiled extends BaseProcess implements IRunnable
{
    /**
     * @var string
     */
    public $message = 'Clear Compiled files';

    /**
     * @var array
     */
    protected $command = ['php', 'artisan', 'clear-compiled'];
}
