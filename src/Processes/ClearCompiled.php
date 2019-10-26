<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Exceptions\ProcessFailed;
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

    /**
     * @return void
     *
     * @throws ProcessFailed
     */
    public function run()
    {
        parent::run();
    }
}
