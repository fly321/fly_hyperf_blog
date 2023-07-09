<?php

namespace HyperfTest\Cases;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtTest extends \HyperfTest\HttpTestCase
{
    public function testExample()
    {
        $key = \Hyperf\Support\env("JWT_KEY");
        print_r($key);
        $time = time();
        $payload = [
            "name" => "John Doe",
            "login_time" => $time,
            "expire_time" => $time + 7200,
        ];
        print_r($payload);

        /**
         * IMPORTANT:
         * You must specify supported algorithms for your application. See
         * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
         * for a list of spec-compliant algorithms.
         */
        $jwt = JWT::encode($payload, $key, 'HS256');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
    }
}