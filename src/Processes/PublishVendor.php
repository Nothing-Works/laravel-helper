<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class PublishVendor extends BaseProcess implements IRunnable
{
    public string $message = 'Publishing Vendor dir';

    protected array $command = ['php', 'artisan', 'vendor:publish', '--provider='.'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider', '--tag=config'];
}
