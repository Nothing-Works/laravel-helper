<?php

namespace LaravelHelper\Processes;

use Exception;
use LaravelHelper\Exceptions\ProcessFailed;
use Symfony\Component\Process\Process;

class BaseProcess
{
    /**
     * @var array
     */
    protected $command = [];

    /**
     * @var int
     */
    protected $timeOut = 60;

    /**
     * @var string
     */
    protected  $reason = 'not sure why';

    /**
     * @return void
     *
     * @throws ProcessFailed|Exception
     */
    protected function run()
    {
        $this->validateCommand();

        $process = $this->runProcess();

        if ($this->processFailed($process))
            throw new Exception($this->reason, 1);
    }

    private function processFailed(Process $process): bool
    {
        return !$process->isSuccessful();
    }

    private function runProcess(): Process
    {
        $process = new Process($this->command);

        $process->setTimeout($this->timeOut)->run($this->printOutput());

        return $process;
    }

    private function printOutput(): callable
    {
        return function ($type, $buffer) {
            echo $buffer;
        };
    }

    /**
     * @throws Exception|void
     */
    private function validateCommand()
    {
        if (empty($this->command))
            throw new Exception('You need to pass some command', 1);
    }
}
