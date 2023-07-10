<?php

namespace App\Dao\Impl;

use App\Exception\FlyException;
use App\Model\Admin;
use Hyperf\Database\Model\Builder;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\ApplicationContext;

class UserDaoImpl implements \App\Dao\UserDao
{

    public function login(?array $data)
    {
        // 判断是否存在username和password
        if (!isset($data['username']) || !isset($data['password'])) {
            throw new FlyException('用户名或密码不能为空');
        }
        // 判断用户名是否存在
        $res = Admin::where(function (Builder $query) use ($data) {
            $query->where('username', $data['username'])->orwhere("email", $data['username']);
        })->firstOr(function () {
            throw new FlyException('用户名不存在');
        });
    }

    public function register(?array $data)
    {
        // 判断是否存在username和password
        if (!isset($data['username']) || !isset($data['password']) || !isset($data['email'])) {
            throw new FlyException('用户名或密码不能为空');
        }
        // 判断用户名是否存在
        $res = Admin::where(function (Builder $query) use ($data) {
            $query->where('username', $data['username'])->orwhere("email", $data['email']);
        })->first();

        if ($res) {
            throw new FlyException('用户名or已存在');
        }

        $data = [
            'username' => $data['username'],
            'password' => $data['password'],
            'email' => $data['email'],
            "nickname" => $data['nickname'] ?? uniqid(),
            "salt" => $data['salt'] ?? uniqid(),
            "avatar" => $data['avatar'] ?? 'https://avatars.githubusercontent.com/u/59600958?v=4',
            "status" => 1,
            "last_login_time" => time(),
            "last_login_ip" => $this->getRealIp(),
        ];

        $data['password'] = md5($data['password'] . $data['salt']);

        $res = Admin::firstOrCreate($data);
        return $res;
    }

    public function getRealIp(): string
    {
        $request = ApplicationContext::getContainer()->get(RequestInterface::class);
        $headers = $request->getHeaders();

        if(isset($headers['x-forwarded-for'][0]) && !empty($headers['x-forwarded-for'][0])) {
            return $headers['x-forwarded-for'][0];
        } elseif (isset($headers['x-real-ip'][0]) && !empty($headers['x-real-ip'][0])) {
            return $headers['x-real-ip'][0];
        }

        $serverParams = $request->getServerParams();
        return $serverParams['remote_addr'] ?? '';

    }


}