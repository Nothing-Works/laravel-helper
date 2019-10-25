<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Exceptions\ProcessFailed;

class LaravelRoot extends BaseProcess
{
    /**
     * @var string
     */
    public $message = 'Checking if it is the root dir';

    /**
     * @var array
     */
    protected $command = ['php', 'artisan'];

    /**
     * @var string
     */
    protected $reason = 'It is not the root of Laravel';

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
