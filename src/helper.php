<?php

use think\Response;

if (!function_exists('apiReturn')) {
    function apiReturn($data = [], string $message = 'SUCCESS', int $code = 0, $statusCode = 200, $header = [], $options = []): Response
    {
        return Response::create([
            'data'      => $data,
            'code'      => $code,
            'message'   => $message,
            'timestamp' => time()
        ], 'json', $statusCode)->header($header)->options($options);
    }
}