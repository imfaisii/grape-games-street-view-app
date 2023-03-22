<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;

trait Jsonify
{
    public static function success(string $message = "success", int $code = 200, mixed $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'code' => $code,
            'data' => $data
        ], $code);
    }

    public static function error(string $message = "error", int $code = 400, mixed $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'code' => $code,
            'data' => $data
        ], $code);
    }

    public static function exception(Exception $exception, int $code = 502, mixed $data = []): JsonResponse
    {
        return response()->json([
            'message' => $exception->getMessage(),
            'code' => $code,
            'data' => $data
        ], $code);
    }
}
