<?php

namespace LaravelHelper\Scripts;


class ModifyComposer extends BaseScript
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
        "@php artisan ide-helper:meta"
    ];

    public function run()
    {
        $data = $this->getData();

        $data['scripts']['post-update-cmd'] = $this->value;

        $this->saveData($data);
    }
}
