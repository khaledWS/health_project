<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

trait SpaResponseTrait
{
    public function successResponse(): JsonResponse
    {
        //TODO we may change response and add ('error' => [error messages])
        return Response()->json([
            "success" => true,
            "code" => 200,
            // "message" => $message,
            // "data" => $data
        ], 200);
    }

    public function successResponseWithData($data): JsonResponse
    {
        //TODO we may change response and add ('error' => [error messages])
        return Response()->json([
            "success" => true,
            "code" => 200,
            // "message" => $message,
            "data" => $data
        ], 200);
    }

    public function successResponseWithLinks($message, $data, $name = 'image'): JsonResponse
    {
        if ($data instanceof Collection) {
            foreach ($data as $item) {
                if ($item->$name != null){
                    $item->$name = Storage::disk('public')->url($item->$name);
                }
            }
        } else {
            if ($data->$name != null){
                $data->$name = Storage::disk('public')->url($data->$name);

            }else{
                $data->$name = null;
            }
        }

        return Response()->json([
            "success" => true,
            "code" => 200,
            "message" => $message,
            "data" => $data
        ]);


    }

    public function successCreatedResponse($message, $data)
    {
        return Response()->json([
            "success" => true,
            "code" => 201,
            "message" => $message,
            "data" => $data
        ], 201);
    }

    public function errorResponse($code = 400): JsonResponse
    {
        return Response()->json([
            "success" => false,
            "code" => $code,
        ], $code);
    }

    public function errorResponseWithData($message, $data = [], $code = 400): JsonResponse
    {
        return Response()->json([
            "success" => false,
            "code" => $code,
            "message" => $message,
            "data" => $data
        ], $code);
    }


    public function middlewareErrorResponse($message, $data = [], $code = 400)
    {
        return Response([
            "success" => false,
            "code" => $code,
            "message" => $message,
            "data" => $data
        ], $code);
    }
}
