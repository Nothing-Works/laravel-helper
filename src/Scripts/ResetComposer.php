<?php

namespace LaravelHelper\Scripts;

use LaravelHelper\Interfaces\IRunnable;

class ResetComposer extends BaseScript implements IRunnable
{
    public $message = 'Resetting composer.json file';
    protected $filePath = '/composer.json';

    protected $isJson = true;

    protected function prepare()
    {
        if (isset($this->data['scripts']['post-update-cmd'])) {
            unset($this->data['scripts']['post-update-cmd']);
        }
    }
}
