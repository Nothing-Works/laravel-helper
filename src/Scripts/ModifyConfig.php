<?php

namespace LaravelHelper\Scripts;

class ModifyConfig extends BaseScript
{
    /**
     * @var string
     */
    protected $filePath = '/config/ide-helper.php';

    /**
     * @var string
     */
    public $message = 'Modifying ide-helper.php file';

    /**
     * @var string
     */
    private $updateSub = '$1 true,';

    /**
     * @var string
     */
    private $data = '';

    /**
     * @var array
     */
    private $updateKeys = ['include_factory_builders', 'include_fluent', 'write_eloquent_model_mixins', 'include_helpers', 'include_class_docblocks'];

    public function run()
    {
        $this->data = $this->getData();

        $this->update();

        $this->saveData($this->data);
    }

    private function update()
    {
        foreach ($this->keyPatterns() as $pattern)
            $this->data = preg_replace($pattern, $this->updateSub, $this->data);
    }

    private function keyPatterns(): array
    {
        $array = [];

        foreach ($this->updateKeys as $key) {
            array_push($array, sprintf('/(\'%s\' =>) \S+/mi', $key));
        }

        return $array;
    }
}
