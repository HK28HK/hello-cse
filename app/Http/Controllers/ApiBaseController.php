<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class ApiBaseController extends Controller
{
    /**
     * Response
     *
     * @param  array<string,mixed>  $headers
     */
    protected static function response(
        mixed $data = [],
        int $status = 200,
        array $headers = [],
        int $options = 0
    ): JsonResponse {
        return response()->json($data, $status, $headers, $options);
    }

    /**
     * Errors
     */
    protected static function error(
        string $message = '',
        int $status = 400
    ): JsonResponse {
        return self::response(
            [
                'error' => $message,
            ],
            $status
        );
    }
}
