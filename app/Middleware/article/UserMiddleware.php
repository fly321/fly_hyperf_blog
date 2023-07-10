<?php

namespace App\Middleware\article;

use App\Exception\FlyException;
use App\Lib\JwtLib;
use Hyperf\Context\Context;
use Hyperf\Di\Annotation\Inject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\SimpleCache\CacheInterface;

class UserMiddleware implements MiddlewareInterface
{
    #[Inject]
    protected CacheInterface $cache;

    #[Inject]
    protected JwtLib $jwtLib;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // 校验登陆
        $token = $request->getHeader('token')[0] ?? '';
        $t1 = md5($token);
        if (!$this->cache->has($t1)) {
            return $this->noLogin();
        }else {
            try {
                $res = $this->jwtLib->decode($token);
            } catch (FlyException $e) {
                return $this->noLogin();
            }
            // 判断过期时间
            if ($res->exp < time()) {
                return $this->noLogin();
            }
        }

        return $handler->handle($request);
    }

    protected function noLogin() {
        $response = Context::get(ResponseInterface::class);
        return $response->withStatus(401)->withBody(new \Hyperf\HttpMessage\Stream\SwooleStream(json_encode([
            'code' => 401,
            'msg' => '请先登录'
        ], JSON_UNESCAPED_UNICODE)));
    }

}