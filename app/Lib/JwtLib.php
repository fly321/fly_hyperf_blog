<?php

namespace App\Lib;

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
        return \Firebase\JWT\JWT::encode($token, $key, 'HS256');
    }

    public function decode($token)
    {
        $key = \Hyperf\Support\env('JWT_KEY');
        return \Firebase\JWT\JWT::decode($token, new Key($key, 'HS256'));
    }
}