<?php

use think\response\Json;

if (!function_exists('api_return')) {
    function apiReturn($data = [], string $message = '', int $code = 0, $statusCode = 200, $header = [], $options = []): Json
    {
        return json([
            'data' => $data, 'message' => $message, 'code' => $code, 'timestamp' => time()
        ], $statusCode, $header, $options);
    }
}