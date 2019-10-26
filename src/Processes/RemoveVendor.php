<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class RemoveVendor extends BaseProcess implements IRunnable
{
    /**
     * @var string
     */
    public $message = 'Removing Vendor dir';

    /**
     * @var array
     */
    protected $command = ['rm', '-rf', './config/ide-helper.php'];
}
