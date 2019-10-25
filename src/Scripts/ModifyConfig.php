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
     * @var array
     */
    private $insertArray = [
        '/(?<=\'magic\' => array)\(\)/mi' => "(/*
                * @see https://laravel.com/docs/5.2/authentication
                * @see https://laravel.com/api/5.2/Illuminate/Auth.html
                * @see \Illuminate\Auth\AuthServiceProvider
                * @see \Illuminate\Auth\AuthManager::__call
                * @see \Illuminate\Contracts\Auth\Guard
                * @see \Illuminate\Contracts\Auth\StatefulGuard
                */
            'Auth' => [
                'check' => 'Illuminate\Contracts\Auth\Guard::check',
                'guest' => 'Illuminate\Contracts\Auth\Guard::guest',
                'user' => 'Illuminate\Contracts\Auth\Guard::user',
                'id' => 'Illuminate\Contracts\Auth\Guard::id',
                'validate' => 'Illuminate\Contracts\Auth\Guard::validate',
                'setUser' => 'Illuminate\Contracts\Auth\Guard::setUser',
                'attempt' => 'Illuminate\Contracts\Auth\StatefulGuard::attempt',
                'once' => 'Illuminate\Contracts\Auth\StatefulGuard::once',
                'login' => 'Illuminate\Contracts\Auth\StatefulGuard::login',
                'loginUsingId' => 'Illuminate\Contracts\Auth\StatefulGuard::loginUsingId',
                'onceUsingId' => 'Illuminate\Contracts\Auth\StatefulGuard::onceUsingId',
                'viaRemember' => 'Illuminate\Contracts\Auth\StatefulGuard::viaRemember',
                'logout' => 'Illuminate\Contracts\Auth\StatefulGuard::logout',
            ],
        )",
        '/(?<=\'Session\' => array\(\'Illuminate\\\\Session\\\\Store\'\),)/mi' => '
        /*
        * The auth settings are defined in config/auth.php
        *
        * \Illuminate\Auth\AuthManager already added by default
        * @see \Illuminate\Auth\AuthServiceProvider::registerAuthenticator()
        * @see \Illuminate\Auth\AuthManager
        *
        * \Illuminate\Auth\RequestGuard is not a supported guard driver.
        * @see \Illuminate\Auth\AuthManager::viaRequest()
        * @see \Illuminate\Auth\RequestGuard
        *
        * Supported: "session", "token"
        * @see \Illuminate\Auth\AuthManager::resolve()
        * @see \Illuminate\Auth\AuthManager::createSessionDriver()
        * @see \Illuminate\Auth\AuthManager::createTokenDriver()
        * @see \Illuminate\Auth\SessionGuard
        * @see \Illuminate\Auth\TokenGuard
        */
        \'Auth\' => [
            \Illuminate\Auth\SessionGuard::class,
            \Illuminate\Auth\TokenGuard::class,
            \Illuminate\Support\Facades\Auth::class,
        ],',
    ];

    /**
     * @var string
     */
    private $updateBool = '$1 true,';

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

        $this->insert();

        $this->saveData($this->data);
    }

    private function insert()
    {
        foreach ($this->insertArray as $key => $value)
            $this->data = preg_replace($key, $value, $this->data);
    }

    private function update()
    {
        foreach ($this->keyPatterns() as $pattern)
            $this->data = preg_replace($pattern, $this->updateBool, $this->data);
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
