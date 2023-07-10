<?php

namespace App\Lib;

use App\Exception\FlyException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtLib
{
    public function encode($data)
    {
        $key = \Hyperf\Support\env('JWT_KEY');
        $time = time();
        $expire = $time +  \Hyperf\Support\env('JWT_EXPIRE');
        $token = [
            'iat' => $time,
            'nbf' => $time,
            'exp' => $expire,
            'data' => $data
        ];
        return JWT::encode($token, $key, 'HS256');
    }

    public function decode($token)
    {
        $key = \Hyperf\Support\env('JWT_KEY');
        try {
            return JWT::decode($token, new Key($key, 'HS256'));
        } catch (\Throwable  $e) {
            throw new FlyException('token 不合法: ' . $e->getMessage());
        }
    }
}