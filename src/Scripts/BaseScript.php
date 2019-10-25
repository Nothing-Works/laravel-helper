<?php

namespace LaravelHelper\Scripts;

class BaseScript
{
    /**
     * @var string
     */
    protected $filePath = '';

    /**
     * @var bool
     */
    protected $isJson = false;

    protected function getData()
    {
        $data = file_get_contents($this->fullPath());

        return $this->isJson ? json_decode($data, true) : $data;
    }

    protected function saveData($data)
    {
        $result = $this->isJson ? json_encode($data) : $data;

        file_put_contents($this->fullPath(), $result);
    }

    private function fullPath(): string
    {
        if (empty($this->filePath))
            throw new Exception('You need to provide the working file', 1);

        return getcwd() . $this->filePath;
    }
}
