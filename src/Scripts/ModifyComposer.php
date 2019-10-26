<?php

namespace LaravelHelper\Scripts;

use LaravelHelper\Interfaces\IRunnable;

class ModifyComposer extends BaseScript implements IRunnable
{
    /**
     * @var string
     */
    protected $filePath = '/composer.json';

    /**
     * @var string
     */
    public $message = 'Modifying composer.json file';

    /**
     * @var bool
     */
    protected $isJson = true;

    private $value = [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "@php artisan clear-compiled",
        "@php artisan ide-helper:generate",
        "@php artisan ide-helper:meta",
        "@php artisan ide-helper:models -N"
    ];

    public function run()
    {
        $data = $this->getData();

        $data['scripts']['post-update-cmd'] = $this->value;

        $this->saveData($data);
    }
}
