<?php

use App\Models\Audit;
use App\Models\PersonalAccessTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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




 function AuthPermission($permission)
{

    $user_id = Auth::user()->id;
    $permission_row = PersonalAccessTokens::where("tokenable_id",$user_id)->orderBy('created_at', 'desc')->first();
   
    if($permission_row === null){
        // dd("adasd");
        return redirect('/login');
    }; //todo: belom kelar
    $permission_array = json_decode($permission_row->abilities);
    $array_search = array_search($permission,$permission_array);
    return gettype($array_search) == "integer" ? true : false;
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
