<?php

namespace LaravelHelper\Scripts;

class BaseScript
{
    /**
     * @var string
     */
    protected $filePath = '';

    protected function getJson()
    {
        return json_decode(file_get_contents($this->fullPath()), true);
    }

    protected function saveJson($data)
    {
        file_put_contents($this->fullPath(), json_encode($data));
    }

    private function fullPath(): string
    {
        if (empty($this->filePath))
            throw new Exception('You need to provide the working file', 1);

        return getcwd() . $this->filePath;
    }
}
