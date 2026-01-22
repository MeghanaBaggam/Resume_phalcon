<?php

namespace App\Utils;

use Phalcon\Di\Di;

class ResponseUtils
{
    private static function response()
    {
        return Di::getDefault()->get('response');
    }

    public static function success($message)
    {
        return self::response()->setJsonContent([
            'success' => true,
            'message' => $message
        ]);
    }

    public static function dataResponse($data)
    {
        return self::response()->setJsonContent([
            'success' => true,
            'data' => $data
        ]);
    }

    public static function authResponse($token)
    {
        return self::response()->setJsonContent([
            'success' => true,
            'token' => $token
        ]);
    }

    public static function error($message)
    {
        return self::response()->setStatusCode(400)->setJsonContent([
            'success' => false,
            'message' => $message
        ]);
    }

    public static function authError($message)
    {
        return self::response()->setStatusCode(401)->setJsonContent([
            'success' => false,
            'message' => $message
        ]);
    }

    public static function accessError($message)
    {
        return self::response()->setStatusCode(403)->setJsonContent([
            'success' => false,
            'message' => $message
        ]);
    }
}
