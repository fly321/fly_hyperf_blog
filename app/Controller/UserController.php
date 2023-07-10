<?php

namespace App\Controller;

use App\Exception\FlyException;
use App\Service\Impl\UserServiceImpl;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController]
class UserController extends BaseController
{
    #[Inject(UserServiceImpl::class)]
    protected UserService $userService;
    public function login(){
        $data = $this->request->all();
        try {
            $result = $this->userService->login($data);
            return $this->success($result);
        }catch (FlyException $e) {
            return $this->error($e->getMessage());
        }
    }

    public function register(){
        $data = $this->request->all();
        try {
            $result = $this->userService->register($data);
            return $this->success($result);
        }catch (FlyException $e) {
            return $this->error($e->getMessage());
        }
    }
}