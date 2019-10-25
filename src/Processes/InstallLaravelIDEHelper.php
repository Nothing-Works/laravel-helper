<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Processes\BaseProcess;

class InstallLaravelIDEHelper extends BaseProcess
{
    /**
     * @var string
     */
    protected $message = 'Installing Laravel Ide helper';

    /**
     * @var array
     */
    protected $command = ['composer', 'require', '--dev', 'barryvdh/laravel-ide-helper'];

    /**
     * @var int
     */
    protected $timeOut = 3600;

    /**
     * @var string
     */
    protected $reason = 'maybe network, maybe time is too short';

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
