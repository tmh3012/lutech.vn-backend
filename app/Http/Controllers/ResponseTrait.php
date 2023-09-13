<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait ResponseTrait
{
    protected function successResponse($data, string $message = null, int $status = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message ?? 'Request was successful.'
        ], $status);
    }
    protected function errorResponse($message, $data = null,  int $status = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'data' => $data,
            'message' => $message ??  'An error has occurred...'
        ], $status);
    }
}
