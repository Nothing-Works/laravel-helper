<?php

namespace LaravelHelper\Scripts;

use LaravelHelper\Interfaces\IRunnable;

class ResetComposer extends BaseScript implements IRunnable
{
    /**
     * @var string
     */
    protected $filePath = '/composer.json';

    /**
     * @var string
     */
    public $message = 'Resetting composer.json file';

    /**
     * @var bool
     */
    protected $isJson = true;

    public function run()
    {
        $data = $this->getData();

        if (isset($data['scripts']['post-update-cmd']))
            unset($data['scripts']['post-update-cmd']);

        $this->saveData($data);
    }
}
