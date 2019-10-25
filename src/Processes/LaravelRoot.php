<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Exceptions\ProcessFailed;

class LaravelRoot extends BaseProcess
{
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
