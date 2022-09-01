<?php

use App\Models\Audit;
use Illuminate\Support\Facades\URL;

function ResponseJSON($data, $code = 200)
{
    $status = null;
    switch ($code) {
        case 200:
            $status = "Success";
            break;
        case 404:
            $status = "Not Found";
            break;
        case 403:
            $status = "Forbidden";
            break;
        case 401:
            $status = "Unauthorized";
            break;
        case 500:
            $status = "Internal Server Error";
            break;
        default:
            $status = "Internal Server Error";
    }
    $respon = [
        'status' => $code,
        'msg' => $status,
        'data' => $data
    ];
    return response()->json($respon, $code)->header('Accept', 'application/json');
}


 function redirectTab($tabID)
{
    return redirect(URL::previous() . "#".$tabID);
}

function addAudit($user_id, $action, $status = null)
{
    try {
        $inputs = ["user_id" => $user_id, "action" => $action, "status" => $status];
        return Audit::create($inputs);
    } catch (Throwable $e) {
        report($e);
        return false;
    }
}
