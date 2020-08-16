<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ResponseBody($item, $status_code = 200, $manualItemBody = false)
    {
        $item_resp = $manualItemBody == true ? $item : ["items" => $item];
        return response()->json($item_resp, $status_code);
    }

    public function ResponseMsgError($msg, $status = 200)
    {
        return response()->json(
            [
                "message" => $msg
            ]
        , $status);
    }
    
}
