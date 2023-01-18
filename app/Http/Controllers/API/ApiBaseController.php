<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;


class ApiBaseController extends Controller
{
    public function sendResponse($result,$code)
    {
        $response=[
            "status" => true,
            "message"=>"success",
            "data"=>$result,
        ];
        return response()->json($response,$code);
    }

    public function sendError($error, $errorMessages = [], $code=404)
    {
        $response=[
            "status"=>false,
            "message"=>$error,
        ];
        if (!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response,$code);
    }

    public function runTimeError($error,$code=404){
        return response()->json([
            "status"=>false,
            "message"=>$error,
        ],$code);
    }
}
