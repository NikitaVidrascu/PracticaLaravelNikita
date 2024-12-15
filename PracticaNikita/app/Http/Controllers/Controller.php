<?php

namespace App\Http\Controllers;

class Controller
{
    public function sendResponse($success, $message, $data = null, $status = 200)
    {
        return response()->json([
            "Success" => $success,
            "Message" => $message,
            "Data" => $data
            
        ], $status);
    }
}
