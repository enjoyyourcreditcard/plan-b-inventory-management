<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\RequestForm as Requester;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class RequestService
{

    public function __construct(Requester $requester)
    {
        $this->requester = $requester;
    }
    
    public function handleAllRequest()
    {
        $requests = $this->requester->with('warehouse')->with('part')->with('user')->get();
        $sorting = $requests->sortBy('status');

        // dd($sortingTest);
        return $sorting->values()->all();
    }

    public function handleMaximumRequest()
    {
        $maxReq = $this->requester->where('status','=', 'active')->count();
        // dd($maxReq);
        Return ($maxReq);
    }
    
    // API Request
    public function handleAllRequestApi(Request $request)
    {
        $user_id = $request->input('user_id');
        $warehouse_id = $request->input('warehouse_id');
        $part_id = $request->input('part_id');
        $status = $request->input('status');
        $grf_code = $request->input('grf_code');

        $requests = $this->requester
        ->when($user_id, function ($query, $user_id){
            return $query->where('user_id', $user_id);
        })
        ->when($warehouse_id, function ($query, $warehouse_id){
            return $query->where('warehouse_id', $warehouse_id);
        })
        ->when($part_id, function ($query, $part_id){
            return $query->orderBy('part_id', $part_id);
        })
        ->when($status, function ($query, $status){
            return $query->orderBy('status', $status);
        })
        ->when($grf_code, function ($query, $grf_code){
            return $query->orderBy('grf_code', $grf_code);
        })
        ->with('warehouse')->with('part')->with('user')->get();
        
        return ($requests);
    }

    public function handleStoreRequestApi(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'part_id' => 'required',
            'warehouse_id' => 'required',
            'grf_code' => 'required',
            'status' => 'required'
        ]);

        $this->requester->create($validatedData);
        return ('Data has been stored');
    }

    public function handleUpdateRequestApi(Request $request, $id)
    {
        $this->requester->find($id)->update([
            'status' => $request->status,
        ]);
        return ('Data has been updated');
    }

    public function handleInactiveRequestApi($id)
    {
        $requests = $this->requester->find($id);
        $requests->status = 'inactive';
        $requests->save();
        return($requests);
    }
}