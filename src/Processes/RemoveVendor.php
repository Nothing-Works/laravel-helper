<?php

namespace LaravelHelper\Processes;

use LaravelHelper\Interfaces\IRunnable;

class RemoveVendor extends BaseProcess implements IRunnable
{
    public string $message = 'Removing Vendor dir';

    protected array $command = ['rm', '-rf', './config/ide-helper.php'];
}
