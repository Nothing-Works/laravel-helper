<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Exceptions\ProcessFailed;
use LaravelHelper\Interfaces\IRunnable;

class Models extends BaseProcess implements IRunnable
{
    /**
     * @var string
     */
    public $message = 'Model files..';

    /**
     * @var array
     */
    protected $command = ['php', 'artisan', 'ide-helper:models', '-N'];

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
