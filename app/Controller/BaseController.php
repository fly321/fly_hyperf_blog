<?php

namespace App\Controller;

class BaseController extends AbstractController
{

    const SUCCESS_CODE = 200;
    const ERROR_CODE = 500;

    public function success($data = [], $msg = 'success', $code = self::SUCCESS_CODE)
    {
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
    }

    public function error($msg = 'error', $code = self::ERROR_CODE)
    {
        return [
            'code' => $code,
            'msg' => $msg,
        ];
    }
}