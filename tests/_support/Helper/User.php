<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class User extends \Codeception\Module
{
    protected $requiredFields = [
        'email',
        'password',
    ];

    public function email(): string
    {
        return $this->config['email'];
    }

    public function password(): string
    {
        return $this->config['password'];
    }
}
