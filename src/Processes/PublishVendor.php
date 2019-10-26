<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class PublishVendor extends BaseProcess implements IRunnable
{
    /**
     * @var string
     */
    public $message = 'Publishing Vendor dir';

    /**
     * @var array
     */
    protected $command = ['php', 'artisan', 'vendor:publish', '--provider=' . 'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider', '--tag=config'];
}
