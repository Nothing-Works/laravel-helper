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
    protected $message = 'Modifying composer.json file';


    private $value = [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "@php artisan clear-compiled",
        "@php artisan ide-helper:generate",
        "@php artisan ide-helper:meta"
    ];

    public function run()
    {
        $data = $this->getJson();

        $data['scripts']['post-update-cmd'] = $this->value;

        $this->saveJson($data);
    }
}
