<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Exceptions\ProcessFailed;
use LaravelHelper\Interfaces\IRunnable;

class Meta extends BaseProcess implements IRunnable
{
    /**
     * @var string
     */
    public $message = 'Meta files..';

    /**
     * @var array
     */
    protected $command = ['php', 'artisan', 'ide-helper:meta'];

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
