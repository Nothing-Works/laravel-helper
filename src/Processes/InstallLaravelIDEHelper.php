<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class InstallLaravelIDEHelper extends BaseProcess implements IRunnable
{
    public string $message = 'Installing Laravel Ide helper';

    protected array $command = ['composer', 'require', '--dev', 'barryvdh/laravel-ide-helper:dev-master'];

    protected int $timeOut = 3600;

    protected string $reason = 'maybe network, maybe time is too short';
}
