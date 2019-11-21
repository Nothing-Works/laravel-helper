<?php

namespace LaravelHelper\Scripts;

class BaseScript
{
    protected $filePath = '';

    protected $isJson = false;

    protected $data = null;

    public function run()
    {
        $this->getData();

        $this->prepare();

        $this->saveData();
    }

    protected function prepare()
    {
        throw new LogicException('You must override the execute() method in the concrete command class.');
    }

    protected function deleteIfExists()
    {
        if (file_exists($this->fullPath())) {
            unlink($this->fullPath());
        }
    }

    protected function createFile($value)
    {
        $fp = fopen($this->fullPath(), 'wb');

        fwrite($fp, $value);

        fclose($fp);
    }

    private function getData()
    {
        $raw = file_get_contents($this->fullPath());

        $this->data = $this->isJson ? json_decode($raw, true) : $raw;
    }

    private function saveData()
    {
        $result = $this->isJson ? json_encode($this->data) : $this->data;

        file_put_contents($this->fullPath(), $result);
    }

    private function fullPath(): string
    {
        if (empty($this->filePath)) {
            throw new Exception('You need to provide the working file', 1);
        }

        return getcwd().$this->filePath;
    }
}
