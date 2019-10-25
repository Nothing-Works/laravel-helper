<?php

namespace LaravelHelper\Exceptions;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ProcessFailed extends ProcessFailedException
{
    public function __construct(Process $process, string $reason = 'not sure')
    {
        parent::__construct($process);
        $this->message .= sprintf(
            "\n\nThe reason why it failed:\n================\n%s",
            $reason
        );
    }
}
