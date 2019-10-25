<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Processes\BaseProcess;

class PublishVendor extends BaseProcess
{
    /**
     * @var string
     */
    protected $message = 'Publishing Vendor dir';

    /**
     * @var array
     */
    protected $command = ['php', 'artisan', 'vendor:publish', '--provider=' . 'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider', '--tag=config'];

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
