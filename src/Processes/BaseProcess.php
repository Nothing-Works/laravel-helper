<?php

namespace LaravelHelper\Processes;

use Exception;
use Symfony\Component\Process\Process;

class BaseProcess
{
    protected array $command = [];

    protected int $timeOut = 60;

    protected string $reason = 'not sure why';

    public function run(): void
    {
        $this->validateCommand();

        $process = $this->runProcess();

        if ($this->processFailed($process)) {
            throw new Exception($this->reason, 1);
        }
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
        if (empty($this->command)) {
            throw new Exception('You need to pass some command', 1);
        }
    }
}
