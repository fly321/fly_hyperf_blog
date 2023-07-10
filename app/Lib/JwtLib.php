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
        $expire = $time +  \Hyperf\Support\env('jwt.JWT_EXPIRE');
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
        } catch (FlyException $e) {
            throw new FlyException('token解析失败，请重新登录！');
        }
    }
}