<?php

namespace App\Dao;

interface UserDao
{
    public function login(?array $data);

    public function register(?array $data);
}