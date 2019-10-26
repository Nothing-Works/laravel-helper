<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class Generate extends BaseProcess implements IRunnable
{
    /**
     * @var string
     */
    public $message = 'Generating files..';

    /**
     * @var array
     */
    protected $command = ['php', 'artisan', 'ide-helper:generate'];
}
