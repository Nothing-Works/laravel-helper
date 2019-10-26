<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class InstallLaravelIDEHelper extends BaseProcess implements IRunnable
{
    /**
     * @var string
     */
    public $message = 'Installing Laravel Ide helper';

    /**
     * @var array
     */
    protected $command = ['composer', 'require', '--dev', 'barryvdh/laravel-ide-helper:dev-master'];

    /**
     * @var int
     */
    protected $timeOut = 3600;

    /**
     * @var string
     */
    protected $reason = 'maybe network, maybe time is too short';
}
