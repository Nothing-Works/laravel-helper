<?php

namespace LaravelHelper\Commands;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessCommands
{
    private $output;
    private $allClasses;
    private $processBar;

    public function __construct(OutputInterface $o, array $c)
    {
        $this->output = $o;
        $this->allClasses = $c;
        $this->processBar = new ProgressBar($o, count($c));
    }

    public function process()
    {
        $this->processBar->start();
        $this->runAll();
        $this->print('All Done !!!');
    }

    private function runAll()
    {
        foreach ($this->allClasses as  $class) {
            $this->runOne($class);
        }
    }

    private function runOne($class)
    {
        $instance = new $class();
        $this->print($instance->message);
        $instance->run();
        $this->processBar->advance();
    }

    private function print($message)
    {
        $this->output->writeln([
            '',
            $message,
        ]);
    }
}
