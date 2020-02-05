<?php

namespace LaravelHelper\Scripts;

use LaravelHelper\Interfaces\IRunnable;

class ResetComposer extends BaseScript implements IRunnable
{
    protected $filePath = '/composer.json';

    public $message = 'Resetting composer.json file';

    protected $isJson = true;

    protected function prepare()
    {
        if (isset($this->data['scripts']['post-update-cmd'])) {
            unset($this->data['scripts']['post-update-cmd']);
        }
    }
}
