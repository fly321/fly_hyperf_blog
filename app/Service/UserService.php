<?php

namespace App\Service;

interface UserService
{
    /**
     * 登陆接口
     * @param array|null $data
     * @return mixed
     */
    public function login(?array $data);

    public function register(?array $data);
}