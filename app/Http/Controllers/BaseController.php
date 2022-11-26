<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function respondOK($data)
    {
        return response()->json($data, 200);
    }

    protected function respondInvalid($msg = "Validation error")
    {
        return response()->json([
            'error' => $msg
        ], 422);
    }

    protected function respondCreated($data)
    {
        return response()->json($data, 201);
    }

    protected function respondUpdated($data)
    {
        return $this->respondCreated($data);
    }

    public function respondDeleted()
    {
        return response()->json([], 204);
    }

    public function respondUnAuthorized($msg = "")
    {
        return response()->json([
            'error' => $msg
        ], 401);
    }

    public function respondForbidden($msg = "Forbidden")
    {
        return response()->json([
            'error' => $msg
        ], 403);
    }

    public function respondNotFound($msg = 'Not Found')
    {
        return response()->json([
            'error' => $msg
        ], 404);
    }

    public function respondAborted($msg = "Server Error", $code = 500)
    {
        return response()->json([
            'error' => $msg
        ], $code);
    }

    public function respondNotImplemented($msg = "Not Implemented")
    {
        return response()->json([
            'error' => $msg
        ], 501);
    }
}
