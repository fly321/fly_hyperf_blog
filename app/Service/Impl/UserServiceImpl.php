<?php

namespace App\Service\Impl;

use App\Dao\Impl\UserDaoImpl;
use App\Dao\UserDao;
use Hyperf\Di\Annotation\Inject;

class UserServiceImpl implements \App\Service\UserService
{

    #[Inject(UserDaoImpl::class)]
    protected UserDao $userDao;
    /**
     * @inheritDoc
     */
    public function login(?array $data)
    {
        return $this->userDao->login($data);
    }

    public function register(?array $data)
    {
        return $this->userDao->register($data);
    }
}